<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('title', 'New Page'); ?>
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
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <form role="form" method="post" action="<?php echo e(route('page.store')); ?>">
            <div class="content-header">
                <h1>Add New Page</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                    <?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- /.box-header -->
                        <!-- form start -->
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Page Title</label>
                                <input type="text" class="form-control" id="title" name= "title" placeholder="Page Title">
                            </div>
                            <div class="form-group">
                                <label for="name">Page Slug</label>
                                <input type="text" class="form-control" id="slug" name= "slug" placeholder="Page Slug">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Page Content
                                <small>Enter Page Content Here...</small>
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
                            <textarea id="editor1" name="body" rows="5" cols="80">
                                Enter page content here...
                            </textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add Page</button>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>