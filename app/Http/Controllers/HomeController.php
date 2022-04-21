<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\model\Product;
use App\model\Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Product::where('stutas',1)->inRandomOrder()->take(8)->get();
        $num = DB::table('carts')->where('user_id',auth()->user()->id)->count();
        //dd($num);
        //dd($data);
        return view('front.index',compact('data','num'));
        //return view('front.index');
    }
}
