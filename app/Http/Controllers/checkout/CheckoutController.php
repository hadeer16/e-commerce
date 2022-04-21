<?php

namespace App\Http\Controllers\checkout;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\model\Cart;
use App\model\Order;
use App\model\Chackup;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num = DB::table('carts')->where('user_id',auth()->user()->id)->count();
        $cate = Cart::where('user_id',auth()->user()->id)->get();
        $summ = Cart::where('user_id',auth()->user()->id)->sum('total');
        //dd($cate);
        return view('front.checkout',compact('num','cate','summ'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = $request->all();
            $dd = Chackup::create($data);
            $cart = Cart::where('user_id',auth()->user()->id)->get();
            foreach ($cart as $carts) {
                $data['chackup_id'] = $dd->id;
                $data['product_id'] = $carts['product_id'];
                $data['quantity'] = $carts['quantity'];
                $data['price'] = $carts['price'];
                $data['total'] = $carts['total'];
                $order = Order::create($data);
            }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
