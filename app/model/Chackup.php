<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Chackup extends Model
{
    protected $fillable=['first_name','last_name','email','phone','city','address','stutas_payaple','status'];


    public function users(){
        return $this->hasMany(User::class,'user_id');
    }
    public function products(){
        return $this->hasMany(Product::class,'product_id');
    }
    public function orders(){
        return $this->belongsTo(Order::class,'chackup_id');
    }
}
