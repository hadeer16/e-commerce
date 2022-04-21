<?php

namespace App\Http\Controllers\catogry;
use App\model\Category;
use App\model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatogryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('pages.catogry.index');
    }
    public function getcatogry()
    {
        $data = Category::all();
        //dd($data);
        return response()->json([
            'data'=>$data,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        // end validation
        $data = $request->all();
        $dd = Category::create($data);
        return response()->json([
            'status'=>200,
            'massage'=>"ok",
        ]);
        return redirect()->route('catogry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);
        $cate = $data->products()->get();
        //dd($cate);
        return view('pages.catogry.show',compact('data','cate'));
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
        $data = Category::find($id);
        $res = $request->all();
        $data->update($res);
        return redirect()->route('catogry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $del = $data->delete();
        return response()->json([
            'status'=>200,
            'massage'=>"ok",
        ]);
    }
    public function ChangeStutas($id){
        $data = Category::select('stutas')->where('id',$id)->first();
        if($data->stutas == 1){
            $stutas = 0;
        }else{
            $stutas = 1;
        }
        Category::where('id',$id)->update(['stutas'=>$stutas]);
        return redirect()->route('catogry.index');
    }
    public function ChangedStutas($id){
        $data = Product::select('stutas')->where('id',$id)->first();
        if($data->stutas == 1){
            $stutas = 0;
        }else{
            $stutas = 1;
        }
        Product::where('id',$id)->update(['stutas'=>$stutas]);
        return redirect()->route('catogry.show',$id);
    }
}
