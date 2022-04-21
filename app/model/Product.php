<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','category_id','title','image','price','discount','tax','description','stutas'];


    public function cate(){
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function carts(){
        return $this->belongsTo(Cart::class,'product_id');
    }
    public function order(){
        return $this->belongsTo(Chackup::class,'product_id');
    }
    public function chack(){
        return $this->belongsTo(Order::class,'product_id');
    }
}
