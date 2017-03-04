<?php $__env->startSection('title', trans('labels.backend.access.roles.management')); ?>

<?php $__env->startSection('after-styles'); ?>
    <?php echo e(Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <h1>Category</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Category Management</h3>

            <div class="box-tools pull-right">
            <a href=<?php echo e(route('admin.categories.create')); ?> class="btn btn-info btn-xs">Category List</a>
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
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($categories->id); ?></td>
                            <td><?php echo e($categories->title); ?></td>
                            <td><img src="<?php echo e(url('images/90x60/categories/'.$categories->icon_image)); ?>"></td>
                            <td><?php echo e($categories->parent_id); ?></td>
                            <td><?php echo e($categories->created_at); ?></td>
                            <td>
                            <a href=<?php echo e(route('admin.categories.edit',$categories->id)); ?> class="btn btn-info btn-xs">Edit</a>

                        <?php echo e(Form::open(["route"=>["admin.categories.destroy",$categories->id],"method" =>"Delete" ,"class" => "btn btn-info btn-xs"])); ?>

                              <button class="btn btn-danger btn-xs">Delete</button>


                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                         <?php echo e($category->links()); ?>

                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts'); ?>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>