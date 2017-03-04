@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
       Product Management
        <small>Product Create</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.products.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role','files' => true ]) }}

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
                        <input type="text" name="title" placeholder="Title" class="form-control">
                    </div><!--col-lg-10-->
                </div><!--form control-->

        <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <input type="text" name="description" placeholder="Description" class="form-control">
                    </div><!--col-lg-10-->
        </div><!--form control-->

           <div class="form-group">
                    <label class="col-lg-2 control-label">Price</label>
                    <div class="col-lg-10">
                        <input type="text" name="price" placeholder="price" class="form-control">
                    </div><!--col-lg-10-->
        </div><!--form control-->
         <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="file" name="product_img" placeholder="Image" class="form-control">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Category ID</label>
                    <div class="col-lg-10">
                  {!! Form::select("category_id",$category_id,null,["class" =>"form-control"]) !!}
  
                    </div><!--col-lg-10-->
                </div><!--form control-->
                    <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product_category_id" class="control-label">Brand</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('brand_id',$brands,null,["class"=>"form-control", "id"=>"brand_id"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->
   <div class="form-group">
                    <label class="col-lg-2 control-label">Quantity</label>
                    <div class="col-lg-10">
                        <input type="text" name="quantity" placeholder="quantity" class="form-control">
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
