<?php
$firstCat = $catPosts->first();
?>


<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-8 col-xl-9 content-wrapper">
        <div data-sticky_column>
            <div class="posts-box2 u-padding-b-0">
                <div class="posts-box2__top">
                    <h3><span><?php echo e($firstCat->name); ?></span></h3>
                </div>
                <div class="posts-list-big-first row">
                    <?php $__currentLoopData = $firstCat->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->index>5): ?>
                            <?php break; ?>
                        <?php endif; ?>
                        <?php if($loop->index == 0): ?>
                    <article class="col-sm-6 col-xl-4">
                        <div class="post-item">
                            <figure>
                                <a href="<?php echo e(route('singlePost', $post->slug)); ?>"><img style="width: 250px;height: 345px;border-radius: 4px;" src="<?php echo e($post->featured_image); ?>" alt="<?php echo e($post->img_alt_text); ?>"></a>
                            </figure>
                            <div class="post-content">
                                <div class="post-meta">
                                    <time datetime="2018-02-14 20:00"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('M. d, Y - g:i A')); ?> MDT </time>
                                </div>
                                <h5><a href="<?php echo e(route('singlePost', $post->slug)); ?>"><?php echo str_limit(strip_tags($post->title), 50, '..'); ?>.</a></h5>
                            </div>
                        </div>
                    </article>
                        <?php else: ?>
                    <article class="col-sm-6 col-xl-4">
                        <div class="post-item">
                            <figure>
                                <a href="<?php echo e(route('singlePost', $post->slug)); ?>"><img style="width: 250px;height:150px; border-radius: 4px" src="<?php echo e($post->featured_image); ?>" alt="<?php echo e($post->img_alt_text); ?>"></a>
                            </figure>
                            <div class="post-content">
                                <div class="post-meta">
                                    <time datetime="2018-02-14 20:00"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('M. d, Y - g:i A')); ?> MDT </time>
                                </div>
                                <h5><a href="<?php echo e(route('singlePost', $post->slug)); ?>"><?php echo str_limit(strip_tags($post->title), 50, '..'); ?>.</a></h5>
                                <p class="post-excerpt">
                                <?php echo str_limit(strip_tags($post->body), 75, '..'); ?>.
                                </p>
                            </div>
                        </div>
                    </article>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-xl-3 side-bar sidebar--right u-md-down-margin-t-40 d-none d-lg-block">
        <div class="side-bar__inner" data-sticky_column>
            <div class="widget widget--title-box">
                <div class="widget__title">
                    <h4>Stay Connected</h4>
                </div>

                <div class="social-connect u-padding-t-30">
                    <ul class="social--redius social--color">
                        <li><a class="social__facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="social__dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="social__google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="social__linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="social__twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="social__instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="social__vimeo" href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li><a class="social__soundcloud" href="#"><i class="fa fa-soundcloud"></i></a></li>
                    </ul>
                </div>

            </div>

            <div class="widget widget--title-box newsletter-two">
                <div class="widget__title">
                    <h4>Newsletter</h4>
                </div>
                <div class="newsletter-box">
                    <p>Your email address will not be this published. Required fields are News Today.</p>
                    <form action="#">
                        <input type="email" placeholder="Email address">
                        <button><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>

            <div class="widget widget--title-box img-banner">
                <figure class="u-padding-t-20">
                    <a href="#">
                        <img src="img/banner-270x300.jpg" alt="">
                    </a>
                </figure>
            </div>

        </div>
    </div>
    </div>
    </div>
    </section>

    <section class="has-sidebar u-margin-t-40 u-padding-b-40">
        <div class="container">
            <div class="row" data-sticky_parent>
                <div class="col-lg-8 content-wrapper">
                    <div data-sticky_column>
                        <?php $__currentLoopData = $catPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->index==0): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                        <div class="posts-box2">
                            <div class="posts-box2__top">
                                <h3><span><?php echo e($category->name); ?></span></h3>
                            </div>
                            <div class="posts-list-fluid-first">
                                <?php $__currentLoopData = $category->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->index>2): ?>
                                        <?php break; ?>
                                    <?php endif; ?>
                                    <?php if($loop->index == 0): ?>
                                <article class="post-item">
                                    <div class="post-item__inner">
                                        <figure>
                                            <a href="<?php echo e(route('singlePost', $post->slug)); ?>"><img style="width: 340px;height: 200px;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;" src="<?php echo e($post->featured_image); ?>" alt="<?php echo e($post->img_alt_text); ?>"></a>
                                        </figure>
                                        <div class="post-content">
                                            <div class="post-meta">
                                                <time datetime="2018-02-14 20:00"><?php echo e(\Carbon\Carbon::parse($post->created_at)->subHours(6)->format('M. d, Y - g:i A')); ?> MDT  </time>
                                            </div>
                                            <h4><a href="<?php echo e(route('singlePost', $post->slug)); ?>"><?php echo str_limit(strip_tags($post->title), 50, '...'); ?></a></h4>
                                            <p class="post-excerpt">
                                                <?php echo str_limit(strip_tags($post->body), 100, '...'); ?>

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
                                            <h5><a href="<?php echo e(route('singlePost', $post->slug)); ?>"><?php echo str_limit(strip_tags($post->title), 50, '...'); ?></a></h5>
                                            <div class="post-item__bottom">
                                                <figure>
                                                    <a href="<?php echo e(route('singlePost', $post->slug)); ?>"><img style="width: 120px;height: 98px;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;" src="<?php echo e($post->featured_image); ?>" alt="<?php echo e($post->img_alt_text); ?>"></a>
                                                </figure>
                                                <p class="post-excerpt">
                                                    <?php echo str_limit(strip_tags($post->body), 70, '...'); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                                    
                                        
                                            
                                                
                                            
                                            
                                            
                                                
                                                    
                                                
                                                
                                                    
                                                
                                            

                                        
                                    
                                

                                
                                    
                                        
                                            
                                                
                                            
                                            
                                            
                                                
                                                    
                                                
                                                
                                                    
                                                
                                            
                                        
                                    
                                

                                
                                    
                                        
                                            
                                                
                                            
                                            
                                            
                                                
                                                    
                                                
                                                
                                                    
                                                
                                            
                                        
                                    
                                


                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php echo $__env->make('user.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>