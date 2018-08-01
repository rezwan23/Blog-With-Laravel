<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('title', 'AdminPanel - Posts'); ?>
<?php $__env->startSection('name', $user->name); ?>
<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script src="<?php echo e(asset('bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<script>
    $(function () {
        $('#example2').DataTable()
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.layouts.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                    <a href="<?php echo e(route('post.create')); ?>" class="btn btn-primary">Add New</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Post Title</th>
                            <th>Post Slug</th>
                            <th>poST Body</th>
                            <th>Categories</th>
                            <th>Featured Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->index+1); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->slug); ?></td>
                            <td>
                                <?php echo str_limit(strip_tags($post->body), 30, '...'); ?>

                            </td>
                            <td>
                                <ul class="cat_list">
                                <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li><?php echo e($cat->name); ?></li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>
                            <td>
                                <div class="img-thumb">
                                    <img src="<?php echo e($post->featured_image); ?>" alt="">
                                </div>
                            </td>
                            <td>
                                <a href="<?php echo e(route('post.edit', $post->slug)); ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <form action="<?php echo e(route('post.destroy', $post->slug)); ?>" method="post" id="deleteform"
                                      onsubmit="return confirm('Are you sure you you want to delete <?php echo e($post->title); ?>??')"
                                >
                                    <?php echo e(method_field('DELETE')); ?>

                                    <?php echo csrf_field(); ?>
                                    <button id="delbtn" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Serial No.</th>
                            <th>Post Title</th>
                            <th>Post Slug</th>
                            <th>Post Body</th>
                            <th>Categories</th>
                            <th>Featured Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>