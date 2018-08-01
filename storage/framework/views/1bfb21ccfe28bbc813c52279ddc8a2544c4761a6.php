<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('name', $user->name); ?>
<?php $__env->startSection('title', 'AdminPanel - Site Meta'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form action="<?php echo e(route('sitemeta.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sitename">Site Name</label>
                            <input type="text" name="sitename" class="form-control" value="<?php echo e($meta ? $meta->sitename : ''); ?>" placeholder="Enter Site Name">
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="text" name="favicon" class="form-control" value="<?php echo e($meta ? $meta->favicon : ''); ?>" placeholder="Enter Site Favicon Url">
                            <a target="_blank" class="btn btn-primary" href="<?php echo e(route('media.index')); ?>">Open Media</a>
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="text" name="logo" class="form-control" value="<?php echo e($meta ? $meta->logo : ''); ?>" placeholder="Enter Site Logo Url">
                            <a target="_blank" class="btn btn-primary" href="<?php echo e(route('media.index')); ?>">Open Media</a>
                        </div>
                        <div class="form-group">
                            <label for="footertext">Site Footer Text</label>
                            <textarea type="text" name="footertext" class="form-control"><?php echo e($meta ? $meta->footertext : ''); ?>

                            </textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>