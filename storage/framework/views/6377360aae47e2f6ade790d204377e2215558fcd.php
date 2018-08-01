<div class="col-lg-4 side-bar sidebar--right u-md-down-margin-t-40">
    <div class="side-bar__inner is_stuck" data-sticky_column>
        <div class="widget widget--title-box single-cat">
            <div class="widget__title">
                <h4>Recent Posts</h4>
            </div>
            <ul class="posts-wrap">
                <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <figure>
                        <a href="#"><img style="width: 80px;height: 65px;border-radius: 4px" src="<?php echo e($post->featured_image); ?>" alt="<?php echo e($post->img_alt_text); ?>"></a>
                    </figure>
                    <div class="post-content">
                        <div class="post-meta">
                            <time datetime="2018-02-14 20:00"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('M. d, Y')); ?>  </time>
                        </div>
                        <h6 class="post-title">
                            <a href="<?php echo e(route('singlePost', $post->slug)); ?>">
                                <?php echo str_limit(strip_tags($post->title), 50, '...'); ?>

                            </a>
                        </h6>

                    </div>
                </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="widget widget--title-box post-categoris">
            <div class="widget__title">
                <h4>Categories </h4>
            </div>
            <div class="post-categoris__wrap">
                <p>Select Category Below...</p>
                <button type="button" class="cat-ctrl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Categories <i class="fa fa-angle-down" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu w-categoris">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item" href="<?php echo e(route('showCategoryPosts', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>