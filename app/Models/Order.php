<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function userDetail()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'userId');
    }

    public function orderDetails()
    {
        return $this->hasMany(\App\Models\OrderDetail::class, 'id', 'orderId');
    }
}



