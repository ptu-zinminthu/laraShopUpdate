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
                            <th>Product</th>
                             <th>Product Price</th>
                            <th>Order Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order_items as $order_item)
                        <tr>
                            <td>{{$order_item->id}}</td>
                            <td>{{$order_item->customer_id}}</td>
                            <td>{{$order_item->product_id}}</td>
                            <td>{{$order_item->product_price}}</td>
                            <td>{{$order_item->order_amount}}</td>
                            
                           
                        </tr>
                        @endforeach
                         {{ $order_items->links() }}
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts')
   
@stop