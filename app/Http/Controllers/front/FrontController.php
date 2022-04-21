<?php

namespace App\Http\Controllers\front;
use App\model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $data = Product::where('stutas',1)->inRandomOrder()->take(8)->get();
        //dd($data);
        return view('front.index',compact('data'));
    }
}
