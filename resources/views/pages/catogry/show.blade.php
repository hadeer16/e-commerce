@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0 text-danger">{{ $data->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('side.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ $data->name }}</li>
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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <td>{{ trans('product.id')}}</td>
                            <td>{{ trans('product.name')}}</td>
                            <td>{{ trans('product.catogry')}}</td>
                            <td>{{ trans('product.image')}}</td>
                            <td>{{ trans('product.title')}}</td>
                            <td>{{ trans('product.text')}}</td>
                            <td>{{ trans('product.price')}}</td>
                            <td>{{ trans('product.discount')}}</td>
                            <td>{{ trans('product.tax')}}</td>
                            <td>{{ trans('product.stutas')}}</td>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $i=0;?>
                            @foreach($cate as $cat)
                            <?php $i++?>
                            <tr style="font-size:16px; font-weight:bold">
                            <td>{{ $i }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->cate->name }}</td>
                            <td><img src="{{ asset('product_img/'.$cat->image) }}" alt=""style="width:70px; height:70px"></td>
                            <td>{{ $cat->title }}</td>
                            <td>{{ $cat->description }}</td>
                            <td>{{ $cat->price }}</td>
                            <td>{{ $cat->discount }}</td>
                            <td>{{ $cat->tax }}</td>
                            <td>
                            @if($cat->stutas == 1)
                                <a href="{{url('changed/'.$cat->id)}}" style="font-size: 18px; text-align:center;" class="badge badge-warning p-3">{{ trans('cato.active') }}</a>
                                @else
                                <a href="{{url('changed/'.$cat->id)}}" style="font-size: 18px; text-align:center;" class="badge badge-dark p-3">{{ trans('cato.inactive') }}</a>
                            @endif  
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    
        $('.alert').alert()
    } );
    </script>
@endsection
