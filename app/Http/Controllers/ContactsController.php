<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactsController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = Http::accept('application/json')->withHeaders([
            'x-api-key' => "PMAK-6343ef2094b59c1db77cf5fe-1f332215fd9d288c36564e7a500087bd63",
        ])->get('https://a63340bf-40a2-45b6-8f4c-39fc70313aa3.mock.pstmn.io/contacts');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contacts.index', [
            'contact' => Contacts::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = collect(json_decode($this->api, true)['results']);
        foreach ($contacts as $contact) {
            if (!Contacts::where('AccountID', $contact['ID'])->exists()) {
                Contacts::create([
                    'AccountID' => $contact['ID'],
                    'AccountName' => $contact['AccountName'],
                    'AddressLine1' => $contact['AddressLine1'],
                    'AddressLine2' => $contact['AddressLine2'],
                    'City' => $contact['City'],
                    'ContactName' => $contact['ContactName'],
                    'Country' => $contact['Country'],
                    'ZipCode' => $contact['ZipCode'],
                ]);
            }
        }
        return redirect('/contacts');
    }
}
