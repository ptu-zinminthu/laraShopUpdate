<?php $__env->startSection('title', trans('labels.backend.access.roles.management')); ?>

<?php $__env->startSection('after-styles'); ?>
    <?php echo e(Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <h1>Order</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Order Management</h3>

            <div class="box-tools pull-right">
            <a href=<?php echo e(route('admin.orders.create')); ?> class="btn btn-info btn-xs">Order List</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th>Customer</th>
                            <th>Order Amount</th>
                            <th>Order Address</th>
                            <th>Order Phone</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Payment Method</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($order->id); ?></td>
                            <td><?php echo e($order->customer_id); ?></td>
                            <td><?php echo e($order->order_amount); ?></td>
                            <td><?php echo e($order->order_address); ?></td>
                            <td><?php echo e($order->order_phone); ?></td>
                            <td><?php echo e($order->order_status); ?></td>
                            <td><?php echo e($order->payment_status); ?></td>
                            <td><?php echo e($order->payment_method); ?></td>
                            <td>
                            <a href=<?php echo e(route('admin.orders.show',$order->id)); ?> class="btn btn-info btn-xs">View</a>

                            <a href=<?php echo e(route('admin.orders.edit',$order->id)); ?> class="btn btn-info btn-xs">Edit</a>

                        <?php echo e(Form::open(["route"=>["admin.orders.destroy",$order->id],"method" =>"Delete" ,"class" => "btn btn-danger btn-xs"])); ?>

                            <button class="btn btn-danger btn-xs">Delete</button>


                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                         <?php echo e($orders->links()); ?>

                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-scripts'); ?>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>