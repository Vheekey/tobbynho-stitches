<?php

namespace App;

use App\User;
use App\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Order extends Model
{
    use SoftDeletes;
    use Rateable;

    public function carts(){
        return $this->hasMany(Cart::class);
    }

}
