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
            <h3 class="box-title">Product Management</h3>

            <div class="box-tools pull-right">
            <a href=<?php echo e(route('admin.products.create')); ?> class="btn btn-info btn-xs">Product Create</a>
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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->title); ?></td>
                            <td><?php echo e($product->description); ?></td>
                             <td><?php echo e($product->price); ?></td>
                          
                             <td> <img src="<?php echo e(url('images/90x60/products/'.$product->image)); ?>"></td>
                            <td><?php echo e($product->category_id); ?></td>
                             <td><?php echo e($product->brand); ?></td>
                            <td><?php echo e($product->quantity); ?></td>
                            <td><?php echo e($product->created_at); ?></td>
                            <td>
                            <a href=<?php echo e(route('admin.products.edit',$product->id)); ?> class="btn btn-info btn-xs">Edit</a>
                            

  <?php echo e(Form::open(["route"=>["admin.products.destroy",$product->id],"method" =>"Delete" ,"class" => "btn btn-info btn-xs"])); ?>


                            <button class="btn btn-danger btn-xs">Delete</button>


                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                         <?php echo e($products->links()); ?>

                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts'); ?>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>