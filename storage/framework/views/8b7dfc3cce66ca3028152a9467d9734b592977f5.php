<?php $__env->startSection('title', $post->title); ?>
<?php $__env->startSection('post-meta'); ?>
<?php echo $post->post_meta; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-8 content-wrapper">

        <div class="m-post-content m-post-content--van">
            <div class="post-top">
                <h1 class="post-title"><?php echo e($post->title); ?>.</h1>
                <div class="post-meta">
                    <div class="item">
                        <time datetime="2018-02-14 20:00"><i class="fa fa-clock-o"></i><?php echo e(\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')); ?> MDT</time>
                    </div>
                </div>
            </div>

            <div class="entry-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat sodales arcu et hendrerit. Nullam semper ac mauris non sagittis. Ut efficitur dui ac tortor volutpat semper. Donec mauris enim, iaculis eu congue facilisis, aliquam consequat orci. Curabitur facilisis nulla in lorem consequat.</p>
                <p>
                    <img class="aligncenter u-radius-3" src="<?php echo e($post->featured_image); ?>" alt="<?php echo e($post->img_alt_text); ?>">
                    <small><?php echo e($post->img_alt_text); ?></small>

                </p>
                <?php echo $post->body; ?>

            </div>

            
                
                
                    
                    
                    
                
            

            <div class="post-tags u-margin-t-40">
                <h6>Tags :</h6>
                <div class="tags-wrap">
                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="cat-world" href="<?php echo e(route('showCategoryPosts', $tag->slug)); ?>"><i class="fa fa-tag" aria-hidden="true"></i><?php echo e($tag->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>