<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'AccountID',
        'AccountName',
        'AddressLine1',
        'AddressLine2',
        'City',
        'ContactName',
        'Country',
        'ZipCode',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('AccountID', 'like', '%' . $query . '%')
            ->orWhere('AccountName', 'like', '%' . $query . '%')
            ->orWhere('AddressLine1', 'like', '%' . $query . '%')
            ->orWhere('AddressLine2', 'like', '%' . $query . '%')
            ->orWhere('City', 'like', '%' . $query . '%')
            ->orWhere('ContactName', 'like', '%' . $query . '%')
            ->orWhere('Country', 'like', '%' . $query . '%')
            ->orWhere('ZipCode', 'like', '%' . $query . '%');
    }
}
