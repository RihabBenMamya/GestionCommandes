<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'Amount',
        'Currency',
        'DeliverTo',
        'OrderID',
        'OrderNumber',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('Amount', 'like', '%' . $query . '%')
            ->orWhere('Currency', 'like', '%' . $query . '%')
            ->orWhere('DeliverTo', 'like', '%' . $query . '%')
            ->orWhere('OrderID', 'like', '%' . $query . '%')
            ->orWhere('OrderNumber', 'like', '%' . $query . '%');
    }
    public function items()
    {
        return $this->belongsToMany(Items::class, 'items_orders', 'item_id', 'order_id');
    }
}
