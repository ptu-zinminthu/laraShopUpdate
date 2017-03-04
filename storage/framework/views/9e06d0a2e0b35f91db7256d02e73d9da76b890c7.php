<?php $__env->startSection('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create')); ?>

<?php $__env->startSection('page-header'); ?>
    <h1>
       Category Management
        <small>Category Create</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['route' => 'admin.categories.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role','files' => true ])); ?>


        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                  <a href=<?php echo e(route('admin.categories.index')); ?> class="btn btn-info btn-xs">Category List</a>
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
                    <label class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input type="file" name="image" placeholder="Image" class="form-control">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">Parent ID</label>
                    <div class="col-lg-10">
                  
  <?php echo Form::select("parent_id",[''=>''] + $parent_id,null,["class" =>"form-control"]); ?>



                    </div><!--col-lg-10-->
                </div><!--form control-->

  <div class="pull-left">
                    <?php echo e(Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs'])); ?>

                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts'); ?>
    <?php echo e(Html::script('js/backend/access/roles/script.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>