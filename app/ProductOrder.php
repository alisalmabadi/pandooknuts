<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $fillable = ['order_id','product_id','weight','count'];
    public $timestamps =false;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
