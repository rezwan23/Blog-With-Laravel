<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-8 content-wrapper">
        <div data-sticky_column>
            <div class="contact-form">
                <div class="form-title">
                    <h4>Online contact information</h4>
                </div>
                <?php if(\Illuminate\Support\Facades\Session::has('success-message')): ?>
                <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button>    <strong>Success!</strong> <?php echo e(\Illuminate\Support\Facades\Session::get('success-message')); ?>

                </div>
                <?php endif; ?>
                <?php if(count($errors->all())>0): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger fade in alert-dismissible show" style="margin-top:18px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="font-size:20px">×</span>
                            </button>    <strong>Error!</strong> <?php echo e($error); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="form-body">
                    <form action="<?php echo e(route('postmessage')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                    <p>Please use the form below to send us your inquiry Fields marked with an * are required.</p>
                    <div class="form-group u-margin-b-25">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group u-margin-b-25">
                        <label for="subject">Subject <sup>*</sup></label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="form-group u-margin-b-25">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company">
                    </div>
                    <div class="form-group u-margin-b-25">
                        <label for="email">Email Address <sup>*</sup></label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group u-margin-b-25">
                        <label for="phone">Phone<sup>*</sup></label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group u-margin-b-25">
                        <label for="message">Your Message<sup>*</sup></label>
                        <textarea class="form-control" id="message" name="message" rows="7"></textarea>
                    </div>
                    <div class="form-submit u-margin-t-20">
                        <button type="submit" class="c-btn text-uppercase c-btn--solid c-btn--color-brand">Submit this contact</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>