<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function vendors(){
        return $this->hasMany(Vendor::class);
    }

    public function getSkuAttribute($value)
    {
        return str_pad($value, 3, '0', STR_PAD_LEFT);
    }
}
