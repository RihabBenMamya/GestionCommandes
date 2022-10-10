<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Items;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $items = Items::all()->count();
        $orders = Orders::all()->count();
        $contacts = Contacts::all()->count();
        $order = Orders::all();
        $amount = 0;
        foreach ($order as $order) {
            $amount += $order->Amount;
        }
        return view('dashboard', compact('items', 'orders', 'amount', 'contacts'));
    }
}
