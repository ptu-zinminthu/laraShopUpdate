@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Category</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Product Management</h3>

            <div class="box-tools pull-right">
            <a href={{route('admin.products.create')}} class="btn btn-info btn-xs">Product Create</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category ID</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                             <td>{{$product->price}}</td>
                          
                             <td> <img src="{{ url('images/90x60/products/'.$product->image)}}"></td>
                            <td>{{$product->category_id}}</td>
                             <td>{{$product->brand}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                            <a href={{route('admin.products.edit',$product->id)}} class="btn btn-info btn-xs">Edit</a>
                            

  {{ Form::open(["route"=>["admin.products.destroy",$product->id],"method" =>"Delete" ,"class" => "btn btn-info btn-xs"]) }}

                            <button class="btn btn-danger btn-xs">Delete</button>


                            </td>
                        </tr>
                        @endforeach
                         {{ $products->links() }}
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts')
   
@stop