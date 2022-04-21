@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ $data->name}} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('side.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('product.product') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{ route('product.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('product.name') }}</label>
                                <input type="text" value="{{ $data->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">{{ trans('product.catogry') }}</label>
                                <select class="form-control" style="padding: 8px" name="category_id" id="exampleFormControlSelect1">
                                    <option selected disabled value="{{ $data->category_id }}">{{ $data->cate->name }}</option>
                                    @foreach ($cato as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('product.title') }}</label>
                                <input value="{{ $data->title}}" type="text" name="title" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('product.image') }}</label>
                                <input type="file" value="{{ $data->image}}" name="image" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('product.price') }}</label>
                                <input value="{{ $data->price}}" type="number" name="price" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('product.discount') }}</label>
                                <input value="{{ $data->discount}}" type="text" name="discount" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('product.tax') }}</label>
                                <input value="{{$data->tax}}" type="text" name="tax" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="exampleInputEmail1">{{ trans('product.text') }}</label>
                        </br>
                            <textarea name="description" id="" cols="60" rows="10">{{ $data->description }}</textarea>
                        </div>
                    </div>
                </br>
            </br>
                    <button type="submit" class="btn btn-danger p-3">{{ trans('product.save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
