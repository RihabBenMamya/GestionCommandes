<?php

namespace App\Exports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->data);
    }
    public function headings(): array
    {
        return [
            "order",
            "delivery_name",
            "delivery_address",
            "delivery_country",
            "delivery_zipcode",
            "delivery_city",
            "items_count",
            "item_index",
            "item_id",
            "item_quantity",
            "line_price_excl_vat",
            "line_price_incl_vat"
        ];
    }
}
