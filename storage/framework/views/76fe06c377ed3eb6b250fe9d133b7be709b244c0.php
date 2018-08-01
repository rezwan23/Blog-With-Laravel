<?php $__env->startSection('name' , \Illuminate\Support\Facades\Auth::user()->name); ?>
<?php $__env->startSection('title', 'AdminPanel - Media'); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">All Media</h3>
                        <a href="<?php echo e(route('media.create')); ?>" class="btn btn-primary">Add New Media</a>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleMedia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2">
                                    <div class="single_img index">
                                        <a href="<?php echo e(route('media.show', $singleMedia->id)); ?>">
                                            <span class="tooltiptext"><?php echo e($singleMedia->title); ?></span>
                                            <img class="img-responsive" src="<?php echo e(asset('/images/'.$singleMedia->media)); ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head'); ?>
    <style>
        .index{
            position: relative;
        }
        .index span.tooltiptext{
            position: absolute;
            top: 15%;
            left: 5%;
            padding: 8px;
            border-radius: 4px;
            color: #fff;
            background-color: #000;
            visibility: hidden;
        }
        .index:hover span.tooltiptext{
            visibility: visible;
        }
    </style>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>