<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>

<?php $__env->startSection('title', 'AdminPanel - Main Menu'); ?>
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
                        <h3 class="box-title">Main Menu Items</h3>
                        <a href="<?php echo e(route('menu.create')); ?>" class="btn btn-primary">Add New Menu Item</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Item Name</th>
                                <th>Item Link</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $menuitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->link); ?></td>
                                    <td><?php echo e($item->position); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('menu.edit', $item->id)); ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <form action="<?php echo e(route('menu.destroy', $item->id)); ?>" method="post" id="deleteform"
                                              onsubmit="return confirm('Are you sure you you want to delete <?php echo e($item->name); ?>??')"
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
                                <th>Item Name</th>
                                <th>Item Link</th>
                                <th>Position</th>
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