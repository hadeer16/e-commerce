<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','product_id','quantity','price','total'];


    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
