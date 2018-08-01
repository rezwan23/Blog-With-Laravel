<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('title', 'Edit Post'); ?>
<?php $__env->startSection('name', $user->name); ?>
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/bower_components/select2/dist/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/bower_components/ckeditor/ckeditor.js')); ?>"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor1', {
                startupMode : 'source',
            });
            CKEDITOR.replace('editor2', {
                startupMode : 'source',
            });
            $('.select2').select2();
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <form role="form" method="post" action="<?php echo e(route('post.update', $post->slug)); ?>">
            <?php echo e(method_field('PUT')); ?>

            <div class="content-header">
                <h1>Add New Post</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="box box-primary">
                    <?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" id="title" name= "title" value="<?php echo e($post->title); ?>" placeholder="Post Title">
                            </div>
                            <div class="form-group">
                                <label for="name">Post Slug</label>
                                <input type="text" class="form-control" disabled id="slug" name= "slug" value="<?php echo e($post->slug); ?>" placeholder="Post Slug">
                            </div>
                            <div class="form-group">
                                <label>Categories</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Categories" name="categories[]">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cat->id); ?>"
                                            <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($postCat->id == $cat->id): ?>
                                                    selected
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        ><?php echo e($cat->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <input type="text" name="featured_image" class="form-control" value="<?php echo e($post->featured_image); ?>" placeholder="http://www.your_image_url">
                            </div>
                            <div class="form-group">
                                <label for="img_alt_text">Featured Image Alt-Text</label>
                                <input type="text" name="img_alt_text" class="form-control" value="<?php echo e($post->img_alt_text); ?>" placeholder="Enter featured image alt text">
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="<?php echo e(route('media.index')); ?>" target="_blank" class="btn btn-primary">Open Media</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Post Meta
                                <small>Edit Post Meta Here...</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                    <textarea id="editor2" name="post_meta" rows="5" cols="80">
                        <?php echo e($post->post_meta); ?>

                    </textarea>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Post Body
                                <small>Edit Your Post Here...</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                    <textarea id="editor1" name="body" rows="10" cols="80">
                        <?php echo e($post->body); ?>

                    </textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>