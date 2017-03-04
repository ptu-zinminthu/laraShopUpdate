@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
       Setting Management
        <small>Setting Create</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.pages.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role','files' => true ]) }}

        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                  <a href={{route('admin.pages.index')}} class="btn btn-info btn-xs">Page List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
        </div><!--box-->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" name="title" class="form-control">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                    <label class="col-lg-2 control-label">Slug</label>
                    <div class="col-lg-10">
                        <input type="text" name="slug"  class="form-control">
                    </div><!--col-lg-10-->
                </div><!--form control-->

               <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <input type="text" name="description"  class="form-control">
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
