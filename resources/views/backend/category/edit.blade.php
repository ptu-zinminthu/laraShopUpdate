@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
       Category Management
        <small>Category Create</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.categories.update',$category], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-role']) }}

        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                  <a href={{route('admin.categories.index')}} class="btn btn-info btn-xs">Category List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
        </div><!--box-->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $category->title }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="text" name="icon_img" placeholder="Image" class="form-control" value="{{ $category->icon_image }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Parent ID</label>
                    <div class="col-lg-10">
                  
  {!! Form::select("parent_id",[''=>''] + $parent_id,null,["class" =>"form-control"]) !!}


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
