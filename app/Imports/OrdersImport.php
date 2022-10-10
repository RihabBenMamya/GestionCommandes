<?php

namespace App\Imports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Orders([
            'Amount'       => $row['Amount'],
            'Currency'     => $row['Currency'],
            'DeliverTo'    => $row['Currency'],
            'OrderID'      => $row['Currency'],
            'OrderNumber'  => $row['Currency'],
        ]);
    }
}
