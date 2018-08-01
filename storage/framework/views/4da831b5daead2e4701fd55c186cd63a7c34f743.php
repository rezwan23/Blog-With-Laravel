<?php $__env->startSection('title', 'Media - '.$media->title); ?>
<?php $__env->startSection('name', Auth::user()->name); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo e($media -> title); ?></h3>
                    </div>
                    <div class="box-body">
                        <img src="<?php echo e(asset('/images/'.$media->media)); ?>" class="img-responsive" alt="">
                    </div>
                    <div class="box-footer">
                            <input class="form-control" type="text" value="<?php echo e($link); ?>" id="myInput">
                            <br>
                            <button class="btn btn-primary" onclick="myFunction()">Copy Link</button>

                        <form action="<?php echo e(route('media.destroy', $media->id)); ?>" method="post" class="pull-right" onsubmit="return confirm('Are you sure? You want to delete this image??');">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('DELETE')); ?>

                            <button href="" type="submit" class="btn btn-danger pull-right">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>