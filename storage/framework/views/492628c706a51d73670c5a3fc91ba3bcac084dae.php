<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('title', 'BatteryByte - Edit Menu Item'); ?>
<?php $__env->startSection('name', $user->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="content-header">
            <h1>Edit Menu Item</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Menu Item</h3>
                    </div>
                <?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo e(route('menu.update', $menu->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Menu Item Name</label>
                                <input type="text" class="form-control" id="name" name= "name" placeholder="Menu Item Name" value="<?php echo e($menu->name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Menu Item Link</label>
                                <input type="text" class="form-control" id="link" name= "link" placeholder="Menu Item Link" value="<?php echo e($menu->link); ?>">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="number" class="form-control" id="position" name="position"
                                       placeholder="Select Position" step="1" value="<?php echo e($menu->position); ?>" />
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>