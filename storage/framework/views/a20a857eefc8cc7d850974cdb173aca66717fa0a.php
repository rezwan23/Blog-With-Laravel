<?php echo $__env->make('user.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="has-sidebar u-padding-tb-60 u-gray-bg">
    <div class="container">
        <div class="row" data-sticky_parent>
            <?php $__env->startSection('content'); ?>
            <?php echo $__env->yieldSection(); ?>
                <?php if(\Illuminate\Support\Facades\Route::currentRouteName()!='home' && \Illuminate\Support\Facades\Route::currentRouteName()!='showContactForm'): ?>
                    <?php echo $__env->make('user.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php if(\Illuminate\Support\Facades\Route::currentRouteName()!='home' && \Illuminate\Support\Facades\Route::currentRouteName()!='showContactForm'): ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('user.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>