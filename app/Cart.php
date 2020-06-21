<?php

namespace App;

use App\User;
use App\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Cart extends Model
{
    use SoftDeletes;
    use Rateable;

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function orders(){
        return $this->belongsTo(Order::class);
    }

    public function vendors(){
        return $this->belongsTo(Vendor::class);
    }

    public function getSkuAttribute($value)
    {
        return str_pad($value, 3, '0', STR_PAD_LEFT);
    }
}
