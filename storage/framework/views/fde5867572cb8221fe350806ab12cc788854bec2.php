<?php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
?>

<?php $__env->startSection('title', 'Batterybyte - Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>