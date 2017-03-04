@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
       Order Management
        <small>Order Create</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.orders.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role']) }}

        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                  <a href={{route('admin.orders.index')}} class="btn btn-info btn-xs">Order List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
        </div><!--box-->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Customer</label>
                    <div class="col-lg-10">
                        {!! Form::select("customer_id",$customer_id,null,["class" =>"form-control"]) !!}
  
                    </div><!--col-lg-10-->
                </div><!--form control-->
  <div class="form-group">
                    <label class="col-lg-2 control-label">Product</label>
                    <div class="col-lg-10">
                        {!! Form::select("products[]",$products,null,["class" =>"form-control","multiple"=>"multiple"]) !!}
  
                    </div><!--col-lg-10-->
                </div><!--form control-->
                 <div class="form-group">
                    <label class="col-lg-2 control-label">Order Amount</label>
                    <div class="col-lg-10">
                        <input type="text" name="order_amount" placeholder="" class="form-control">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Order Address</label>
                    <div class="col-lg-10">
                  <input type="text" name="order_address" placeholder="" class="form-control">

                    </div><!--col-lg-10-->
                </div><!--form control-->
                                <div class="form-group">
                    <label class="col-lg-2 control-label">Order Phone</label>
                    <div class="col-lg-10">
                  <input type="text" name="order_phone" placeholder="" class="form-control">

                    </div><!--col-lg-10-->
                </div><!--form control-->
                                <div class="form-group">
                    <label class="col-lg-2 control-label">Order Status</label>
                    <div class="col-lg-10">
                  {!! Form::select("order_status",["0"=>"Pending","1" =>"completed"],null,["class" =>"form-control"]) !!}
  
                    </div><!--col-lg-10-->
                </div><!--form control-->
                                <div class="form-group">
                    <label class="col-lg-2 control-label">Payment Status</label>
                    <div class="col-lg-10">
                  {!! Form::select("payment_status",["0"=>"Pending","1" =>"completed"],null,["class" =>"form-control"]) !!}

                </div><!--form control-->
                                <div class="form-group">
                    <label class="col-lg-2 control-label">Payment Method</label>
                    <div class="col-lg-10">
                   {!! Form::select("payment_method",["0"=>"Cash","1" =>"MPU"],null,["class" =>"form-control"]) !!}

                    </div><!--col-lg-10-->
                </div><!--form control-->
  


  <div class="pull-left">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop
