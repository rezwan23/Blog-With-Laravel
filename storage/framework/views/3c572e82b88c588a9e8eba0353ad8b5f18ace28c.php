<?php $__env->startSection('title', $categoryPosts->name); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-8 content-wrapper">
        <div data-sticky_column>
            <div class="posts-box2">
                <div class="posts-box2__top">
                    <h3><span><?php echo e($categoryPosts->name); ?></span></h3>
                </div>
                <div class="posts-list-fluid-first">
                    <?php $__currentLoopData = $categoryPosts->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->index == 0): ?>
                    <article class="post-item">
                        <div class="post-item__inner">
                            <figure>
                                <a href="<?php echo e(route('singlePost', $post->slug)); ?>"><img src="<?php echo e($post->featured_image); ?>" class="ft_img_first" alt="<?php echo e($post->img_alt_text); ?>"></a>
                            </figure>
                            <div class="post-content">
                                <div class="post-meta">
                                    <time datetime="2018-02-14 20:00"><?php echo e(\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')); ?> MDT </time>
                                </div>
                                <h4><a href="<?php echo e(route('singlePost', $post->slug)); ?>"><?php echo str_limit(strip_tags($post->title), 60, '...'); ?></a></h4>
                                <p class="post-excerpt">
                                    <?php echo str_limit(strip_tags($post->body), 150, '...'); ?>

                                </p>
                            </div>
                        </div>
                    </article>
                        <?php else: ?>
                            <article class="post-item">
                                <div class="post-item__inner">
                                    <div class="post-item__top">
                                        <div class="post-meta">
                                            <time datetime="2018-02-14 20:00"><?php echo e(\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')); ?> MDT  </time>
                                        </div>
                                        <h5><a href="<?php echo e(route('singlePost', $post->slug)); ?>"><?php echo str_limit(strip_tags($post->title), 60, '...'); ?></a></h5>
                                        <div class="post-item__bottom">
                                            <figure>
                                                <a href="<?php echo e(route('singlePost', $post->slug)); ?>"><img src="<?php echo e($post->featured_image); ?>" class="ft_img" alt="<?php echo e($post->img_alt_text); ?>"></a>
                                            </figure>
                                            <p class="post-excerpt">
                                                <?php echo str_limit(strip_tags($post->body), 50, '...'); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endif; ?>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>