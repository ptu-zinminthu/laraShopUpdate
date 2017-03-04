@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
       Product Management
        <small>Product Edit</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.products.update',$product], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-role']) }}

        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                  <a href={{route('admin.products.index')}} class="btn btn-info btn-xs">Product List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
        </div><!--box-->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $product->title }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->
  <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <input type="text" name="description" placeholder="Title" class="form-control" value="{{ $product->description }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Price</label>
                    <div class="col-lg-10">
                        <input type="text" name="price" placeholder="Title" class="form-control" value="{{ $product->price }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->
                 <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="file" name="image" placeholder="Image" class="form-control" value="{{ $product->image }}">
                    </div><!--col-lg-10-->
                </div><!--form control-->

   <div class="form-group">
                    <label class="col-lg-2 control-label">Category ID</label>
                    <div class="col-lg-10">
                  
  {!! Form::select("category_id",$category_id,null,["class" =>"form-control"]) !!}


                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Brand</label>

                    <div class="col-lg-10">
                        {!!Form::select("brand_id", $brands, $product->brand_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                   <div class="form-group">
                    <label class="col-lg-2 control-label">Quantity</label>
                    <div class="col-lg-10">
                        <input type="text" name="quantity" placeholder="Image" class="form-control" value="{{ $product->quantity }}">
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
