<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('title', 'AdminPanel - Categories'); ?>
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Categories</h3>
                        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">Add New</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->slug); ?></td>
                                <td>
                                    <a href="<?php echo e(route('categories.edit', $category->slug)); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="<?php echo e(route('categories.destroy', $category->slug)); ?>" method="post" id="deleteform"
                                        onsubmit="return confirm('Are you sure you you want to delete <?php echo e($category->name); ?>??')"
                                    >
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($category->id); ?>" name="id">
                                        <button id="delbtn" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial No.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
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