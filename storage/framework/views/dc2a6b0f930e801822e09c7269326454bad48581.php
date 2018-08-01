<?php $__env->startSection('title', 'AdminPanel - New Media'); ?>
<?php $__env->startSection('name' , \Illuminate\Support\Facades\Auth::user()->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="box-header with-border">
                        <h3 class="box-title">New Media</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(route('media.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Select Media Type</label>
                                    <select class="form-control" name="media_cat">
                                        <option>Select One</option>
                                        <option value="Photo">Photo</option>
                                        <option value="Vedio">Vedio</option>
                                        <option value="Document">Document</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="media">Media Upload</label>
                                <input type="file" name="media">
                            </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input class="form-control" type="text" name="title" placeholder="Enter media title">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>