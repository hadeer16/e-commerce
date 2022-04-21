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
            <h4 class="mb-0">الطلبات</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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
                            <th>ID</th>
                            <th>NAME</th>
                            <th>PHONE</th>
                            <th>EMAIL</th>
                            <th>CITY</th>
                            <th>ADDRESS</th>
                            <th>PAYMENT METHOD</th>
                            <th>ORDER</th>
                            <th>STUTAS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach($data as $order)
                        <?php $i++?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->address }}</td>
                        <td>
                        @if($order->stutas_payaple ==1 )
                        الدفع اونلاين
                        @else
                        الدفع عند الاستلام
                        </td>
                        @endif
                        <td><a href="{{route('order.show',$order->id)}}" class="btn btn-danger">Order</a></td>
                        <td>
                            @if($order->status == 1)
                            <a href="{{url('orders/'.$order->id)}}" class="btn btn-danger">تحت الطلب</a>
                            @else
                            <a href="{{url('orders/'.$order->id)}}" class="btn btn-success">تم الانتهاء</a>
                        </td>
                            @endif
                        <td></td>
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
} );
</script>
@endsection
