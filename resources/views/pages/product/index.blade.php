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
            <h4 class="mb-0">{{ trans('product.product') }}</h4>
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
<a href="{{ route('product.create') }}" class="btn btn-danger">{{ trans('product.add') }}</a>
</br>
</br>
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
                            <td>{{ trans('product.action')}}</td>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $i=0;?>
                            @foreach ($data as $dd)
                            <?php $i++?>
                            <tr style="font-size:16px; font-weight:bold">
                            <td>{{ $i }}</td>
                            <td>{{ $dd->name }}</td>
                            <td>{{ $dd->cate->name }}</td>
                            <td><img src="{{ asset('product_img/'.$dd->image) }}" alt=""style="width:70px; height:70px"></td>
                            <td>{{ $dd->title }}</td>
                            <td>{{ $dd->description }}</td>
                            <td>{{ $dd->price }}</td>
                            <td>{{ $dd->discount }}</td>
                            <td>{{ $dd->tax }}</td>
                            <td>
                            @if($dd->stutas == 1)
                                <a href="{{url('changes/'.$dd->id)}}" style="font-size: 18px; text-align:center;" class="badge badge-warning p-3">{{ trans('cato.active') }}</a>
                                @else
                                <a href="{{url('changes/'.$dd->id)}}" style="font-size: 18px; text-align:center;" class="badge badge-dark p-3">{{ trans('cato.inactive') }}</a>
                            @endif 
                            </td>
                            <td style="display:inline;">
                                <button  type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#delete{{ $dd->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="{{ route('product.edit',$dd->id) }}" class="btn btn-danger mt-4"><i class="fa fa-edit"></i></a>
                            </td>
                            {{-- modal delete --}}
                            <div class="modal fade" id="delete{{$dd->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                    <h4 style="text-align: center">{{ trans('product.do') }}</h4>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('product.close') }}</button>
                                    <form action="{{ route('product.destroy',$dd->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-success">{{ trans('product.delete') }}</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div> 
                            {{-- end modal delete --}}

                            {{-- modal edit --}}
                        {{-- <div class="modal fade" id="edit{{$cate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ trans('cato.edit') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('catogry.update',$cate->id)}}">
                                        @method('put')
                                            @csrf
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">{{ trans('cato.name') }}</label>
                                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{$cate->name}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('cato.close') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ trans('cato.save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>  --}}
                            {{-- end modal edit --}}
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
