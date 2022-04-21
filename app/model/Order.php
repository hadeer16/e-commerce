<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['chackup_id','product_id','quantity','price','total'];


    public function chack(){
        return $this->belongsTo(Chackup::class,'chackup_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
