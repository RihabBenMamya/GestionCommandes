<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Orders;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Models\Contacts;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = Http::accept('application/json')->withHeaders([
            'x-api-key' => "PMAK-6343ef2094b59c1db77cf5fe-1f332215fd9d288c36564e7a500087bd63",
        ])->get('https://a63340bf-40a2-45b6-8f4c-39fc70313aa3.mock.pstmn.io/orders');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('pages.orders.index', [
            'order' => Orders::class
        ]);
    }
    /**
     * Export csv file.
     *

     */
    public function export()
    {
        $createContact = new ContactsController;
        $createContact->create();

        $orders = collect(json_decode($this->api, true)['results']);
        $i = 1;
        foreach ($orders as $order) {
            if (!Orders::where('OrderID', $order['OrderID'])->exists()) {
                 Orders::create([
                    'Amount' => $order['Amount'],
                    'Currency' => $order['Currency'],
                    'DeliverTo' => $order['DeliverTo'],
                    'OrderID' => $order['OrderID'],
                    'OrderNumber' => $order['OrderNumber'],
                ]);
            }

            foreach ($order['SalesOrderLines']['results'] as $item) {
                $itemCount = count($order['SalesOrderLines']['results']);
                if (!Items::where('Item', $item['Item'])->exists()) {
                    $newItem = Items::create([
                        'Amount' => $item['Amount'],
                        'Description' => $item['Description'],
                        'Discount' => $item['Discount'],
                        'Item' => $item['Item'],
                        'ItemDescription' => $item['ItemDescription'],
                        'Quantity' => $item['Quantity'],
                        'UnitCode' => $item['UnitCode'],
                        'UnitDescription' => $item['UnitDescription'],
                        'UnitPrice' => $item['UnitPrice'],
                        'VATAmount' => $item['VATAmount'],
                        'VATPercentage' => $item['VATPercentage'],

                    ]);
                    $newItem->orders()->attach(Orders::where('OrderID', $order['OrderID'])->first()->id);
                }
                $contact = Contacts::where('AccountID', $order['DeliverTo'])->first();
                $data[$i] = (object)([
                    "order" => $order['OrderID'],
                    "delivery_name" => $contact->AccountName,
                    "delivery_address" => $contact->AddressLine1,
                    "delivery_country" => $contact->Country,
                    "delivery_zipcode" => $contact->ZipCode,
                    "delivery_city" => $contact->City,
                    "items_count" => $itemCount,
                    "item_index" => $i,
                    "item_id" => $item['Item'],
                    "item_quantity" => $item['Quantity'],
                    "line_price_excl_vat" => $item['Amount'],
                    "line_price_incl_vat" => $item['Amount'] + $item['VATAmount'],
                ]);
                $i += 1;
            }
        }
        return Excel::download(new OrdersExport($data), 'orders.csv');
        return redirect('/orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->export();
    }


}
