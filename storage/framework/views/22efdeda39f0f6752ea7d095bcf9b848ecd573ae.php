<?php $__env->startSection('name', \Illuminate\Support\Facades\Auth::user()->name); ?>
<?php $__env->startSection('title', $page->title); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-8 content-wrapper">

        <div class="m-post-content m-post-content--van">
            <div class="post-top">
                <h1 class="post-title"><?php echo e($page->title); ?>.</h1>
                <div class="post-meta">
                    <div class="item">
                        <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i><?php echo e(\Carbon\Carbon::parse($page->created_at)->subHours(6)->format('M. d, Y - g:i A')); ?> MDT</time>
                    </div>
                </div>
            </div>

            <div class="entry-content">
                <?php echo $page->body; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>