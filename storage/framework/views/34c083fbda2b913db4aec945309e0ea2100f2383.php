<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('name', $user->name); ?>
<?php $__env->startSection('title', 'Not Found'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="<?php echo e(route('dashboard')); ?>">return to dashboard</a>
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>