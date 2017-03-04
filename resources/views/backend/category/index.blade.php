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
            <h3 class="box-title">Category Management</h3>

            <div class="box-tools pull-right">
            <a href={{route('admin.categories.create')}} class="btn btn-info btn-xs">Category List</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Icon_Image</th>
                            <th>Parent ID</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $categories)
                        <tr>
                            <td>{{$categories->id}}</td>
                            <td>{{$categories->title}}</td>
                            <td><img src="{{ url('images/90x60/categories/'.$categories->icon_image)}}"></td>
                            <td>{{$categories->parent_id}}</td>
                            <td>{{$categories->created_at}}</td>
                            <td>
                            <a href={{route('admin.categories.edit',$categories->id)}} class="btn btn-info btn-xs">Edit</a>

                        {{ Form::open(["route"=>["admin.categories.destroy",$categories->id],"method" =>"Delete" ,"class" => "btn btn-info btn-xs"]) }}
                              <button class="btn btn-danger btn-xs">Delete</button>


                            </td>
                        </tr>
                        @endforeach
                         {{ $category->links() }}
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


@stop

@section('after-scripts')
   
@stop