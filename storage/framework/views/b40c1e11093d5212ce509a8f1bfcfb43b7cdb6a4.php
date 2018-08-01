<?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="content-wrapper">
<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldSection(); ?>

</div>
<?php echo $__env->make('admin.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>