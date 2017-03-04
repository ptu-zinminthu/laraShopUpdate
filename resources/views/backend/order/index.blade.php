@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Order</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Order Management</h3>

            <div class="box-tools pull-right">
            <a href={{route('admin.orders.create')}} class="btn btn-info btn-xs">Order List</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th>Customer</th>
                            <th>Order Amount</th>
                            <th>Order Address</th>
                            <th>Order Phone</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Payment Method</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer_id}}</td>
                            <td>{{$order->order_amount}}</td>
                            <td>{{$order->order_address}}</td>
                            <td>{{$order->order_phone}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>
                            <a href={{route('admin.orders.show',$order->id)}} class="btn btn-info btn-xs">View</a>

                            <a href={{route('admin.orders.edit',$order->id)}} class="btn btn-info btn-xs">Edit</a>

                        {{ Form::open(["route"=>["admin.orders.destroy",$order->id],"method" =>"Delete" ,"class" => "btn btn-danger btn-xs"]) }}
                            <button class="btn btn-danger btn-xs">Delete</button>


                            </td>
                        </tr>
                        @endforeach
                         {{ $orders->links() }}
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts')
   
@stop