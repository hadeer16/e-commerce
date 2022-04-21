<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Category;
use App\model\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('pages.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('pages.product.create',compact('data'));
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
        $catogry = $request->category_id;
        $dd = Category::where('id',$catogry)->first();
        $ss = $dd->stutas;
        $data['stutas'] = $ss;
        $imagename = time().'.'.request()->image->getClientOriginalExtension();
        $data['image'] = $imagename;
        request()->image->move(public_path('product_img'), $imagename);
        $prod = Product::create($data);
        return redirect()->route('product.index');
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
        $data = Product::find($id);
        $cato = Category::all();
        return view('pages.product.edit',compact('data','cato'));
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
        $prod = $request->all();
        if($request->has('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $prod['image'] = $filename;
            $image->move(public_path('product_img'),$filename);
    }
    $data = Product::find($id);
    $data->update($prod);
    return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product.index');
    }
    public function changestutas($id)
    {
        $data = Product::select('stutas')->where('id',$id)->first();
        if($data->stutas == 1)
        {
            $stutas = 0;
        }else
        {
            $stutas = 1;
        }
        Product::where('id',$id)->update(['stutas'=>$stutas]);
        return redirect()->route('product.index');
    }
}
