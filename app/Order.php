<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price','order_type_id','name','last_name','phone_number'];

    public function products()
    {
        return $this->hasMany(ProductOrder::class,'order_id');
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class,'order_type_id');
    }
}
