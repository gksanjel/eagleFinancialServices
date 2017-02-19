<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutualfund extends Model
{
    protected $fillable=[
        'customer_id',
        'name',
        'units_purchased',
        'purchase_price',
        'purchase_date',
        'recent_value',
        'recent_date',
    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
