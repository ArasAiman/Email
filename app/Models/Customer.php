<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'address1',
        'address2',
        'state',
        'postcode',
        'pic',
        'email',
        'subscription_start_date', // Updated column name to match the correct one
        'renewal_date', // Updated column name to match the correct one
        'subscription',
    ];

    public $timestamps = false;
}
