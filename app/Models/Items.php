<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'Amount',
        'Description',
        'Discount',
        'Item',
        'ItemDescription',
        'Quantity',
        'UnitCode',
        'UnitDescription',
        'UnitPrice',
        'VATAmount',
        'VATPercentage',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('Amount', 'like', '%' . $query . '%')
            ->orWhere('Description', 'like', '%' . $query . '%')
            ->orWhere('Discount', 'like', '%' . $query . '%')
            ->orWhere('Item', 'like', '%' . $query . '%')
            ->orWhere('ItemDescription', 'like', '%' . $query . '%')
            ->orWhere('Quantity', 'like', '%' . $query . '%')
            ->orWhere('UnitCode', 'like', '%' . $query . '%')
            ->orWhere('UnitDescription', 'like', '%' . $query . '%')
            ->orWhere('UnitPrice', 'like', '%' . $query . '%')
            ->orWhere('VATAmount', 'like', '%' . $query . '%')
            ->orWhere('VATPercentage', 'like', '%' . $query . '%');
    }
    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'items_orders', 'item_id', 'order_id');
    }
}
