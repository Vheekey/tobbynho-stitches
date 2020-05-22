<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use SoftDeletes;
    use Rateable;

    public function vendors(){
        return $this->hasMany(Vendor::class);
    }

    public function getSkuAttribute($value)
    {
        return str_pad($value, 3, '0', STR_PAD_LEFT);
    }
}
