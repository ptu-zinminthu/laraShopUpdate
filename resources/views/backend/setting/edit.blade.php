@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
       Setting Management
        <small>Setting Edit</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.settings.update',$setting], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-role']) }}

        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                  <a href={{route('admin.settings.index')}} class="btn btn-info btn-xs">Setting List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
        </div><!--box-->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control" value="{{ $setting->name }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                    <label class="col-lg-2 control-label">Value</label>
                    <div class="col-lg-10">
                        <input type="text" name="value"  class="form-control" value="{{ $setting->value }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->

            

  <div class="pull-left">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop
