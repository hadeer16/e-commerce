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
            <h4 class="mb-0">{{ trans('cato.catogry') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{trans('side.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('cato.catogry') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')


{{-- error validation --}}

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" style="font-size: 18px" role="alert">
    @foreach ($errors->all() as $error)
    <strong>{{ trans('cato.error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    @endforeach
</div>
@endif
{{-- end validation --}}


{{-- model add catogry --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('cato.add') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">{{ trans('cato.name') }}</label>
                            <input type="text" name="name" class="form-control name" id="formGroupExampleInput" placeholder="Enter the name of Level">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('cato.name') }}</label>
                                <select class="form-control stutas form-control-lg" name="stutas">
                                    <option selected disabled>{{ trans('cato.status') }}</option>
                                    <option value="1">{{ trans('cato.active') }}</option>
                                    <option value="0">{{ trans('cato.inactive') }}</option>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('cato.close') }}</button>
                            <button type="submit" class="btn btn-primary add">{{ trans('cato.save') }}</button>
                        </div>
                    </form>
                </div>
    </div>
    </div>
</div>

{{-- modal-delete --}}
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="del_cat">
        <h3>هل تريد حذف هذا البيان ؟</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary delt_cat">Delete</button>
        </div>
      </div>
    </div>
  </div>


<button type="button" class="btn btn-danger mb-3 mr-3" data-toggle="modal" data-target="#exampleModal">
    {{ trans('cato.add') }}
</button>






<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td>{{ trans('cato.id')}}</td>
                                            <td>{{ trans('cato.name')}}</td>
                                            <td>{{ trans('cato.status')}}</td>
                                            <td>{{ trans('cato.action')}}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
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
    order();
    function order(){
        $.ajax({
            type:"GET",
            url:"/getcatogry",
            dataType:"json",
            success: function(response){
                $('tbody').html("");
                $i=0;
                //console.log(response.data);
                $.each(response.data,function(key,item){
                    $i++;
                    let row = `<tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td class="btn btn-success pr-3" pl-3 id="${item.id}"><a href="">${item.stutas ==1 ? 'متوفر' : 'غيرمتوفر'}</a></td>
                        <td>
                            <button type="button" class="btn btn-primary delete" value="${item.id}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" value="${item.id}" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            </td>
                        </tr>`
                        $('tbody').append(row);
                })
            }
        });
    }

    $(document).on('click','.delete',function(e){
        e.preventDefault();
        var del = $(this).val();
        $('#del_cat').val(del);
        $('#delete').modal('show');
    });
    $(document).on('click','.delt_cat',function(e){
        e.preventDefault();
        var dd = $('#del_cat').val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            type:"DELETE",
            url:"del_cate"+dd,
            success : function(response){
                $('#delete').modal('hide');
                order();
            }
        })
    })


    $(document).on('click','.add',function(e){
        e.preventDefault();
        var data = {
            'name': $('.name').val(),
            'stutas':$('.stutas').val()
        }
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        //console.log(data);
        $.ajax({
            type:"POST",
            url:"{{ route('setcatogry') }}",
            data:data,
            dataType:"json",
            success: function(response){
                //console.log(response);
                $('#exampleModal').find('input').val("");
                $('#exampleModal').modal('hide');
                order();
            }
        });
    });


    $('#example').DataTable();

    $('.alert').alert()
} );
</script>
@endsection

