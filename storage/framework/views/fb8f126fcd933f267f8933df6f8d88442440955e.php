
<!DOCTYPE html>
<html class="html" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $__env->startSection('post-meta'); ?>
    <?php echo $__env->yieldSection(); ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo e($sitemeta->favicon); ?>" />

    <title><?php echo e($sitemeta->sitename); ?> - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700,800" rel="stylesheet">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('/user/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/user/vendor/owl.carousel2/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/user/vendor/owl.carousel2/owl.theme.default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/user/vendor/magnific-popup/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/user/vendor/custom-icon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/user/vendor/animate.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $__env->startSection('head'); ?>
    <?php echo $__env->yieldSection(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/user/css/newstoday-v.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/user/css/style.css')); ?>">
    <!-- endinject -->

    <!-- inject:head:js -->
    <script src="<?php echo e(asset('/user/vendor/modernizr-2.8.3.min.js')); ?>"></script>
    <!-- endinject -->
</head>
<body class="u-gray-bg">

<header class="header header--style-two">
    <div class="headet__top">
        <div class="container">
            <div class="row u-flex--item-center">
                <div class="col-2">
                    <div class="aside-menubar">
                        <button id="JS-openButton">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
                <div class="col-8 text-center">
                    <div class="header__logo">
                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e($sitemeta->logo); ?>" alt="<?php echo e($sitemeta->sitename); ?>"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="header__search text-right">
                        <button class="JS-search-trigger">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <!--header search area -->
                    <div class="header__search__form">
                        <div class="header__search__inner">
                            <button class="close-btn JS-form-close"><i class="fa fa-times"></i></button>
                            <form class="header__search__form-wrapper" action="<?php echo e(route('search')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button class="search-action"><span><i class="fa fa-search"></i></span></button>
                                <input class="search-input" type="text" name="string" placeholder="Search here" required>
                            </form>
                        </div>
                    </div><!--// header search area end-->
                </div>
            </div>
        </div>
    </div>

    <nav class="header__nav d-none d-lg-block">
        <div class="container text-center u-relative">
            <ul>
                <li><a href="<?php echo e(\Illuminate\Support\Facades\URL::to('/')); ?>">Home</a></li>
                <?php $__currentLoopData = $memuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e($item->link); ?>"><?php echo e($item->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                    
                        
                        
                            
                            
                            
                            
                        

                        
                        
                            
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                                
                                                    
                                            
                                                
                                            

                                        
                                    
                                
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                                
                                                    
                                            
                                                
                                            

                                        
                                    
                                
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                                
                                                    
                                            
                                                
                                            

                                        
                                    
                                
                            
                        

                    


                
                <li><a href="<?php echo e(route('showContactForm')); ?>">Contact Us</a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- Mobile menu area start -->
<div class="mobile-menu-area">
    <div class="btn-wrap">
        <button  id="JS-closeButton"><i class="fa fa-times"></i></button>
    </div>
    <div class="search-form">
        <form action="<?php echo e(route('search')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input placeholder="Search Here" name="string" required type="text">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
    <nav class="mobile-menu">
        <ul>
            <li class="active"><a class="collapsed has-child" data-toggle="collapse" aria-expanded="true"  href="<?php echo e(route('home')); ?>">Home</a>
            <?php $__currentLoopData = $memuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="collapsed has-child" data-toggle="collapse" aria-expanded="true"  href="<?php echo e($item->link); ?>"><?php echo e($item->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                
                    
                    
                    
                
            
            
                
                    
                    
                
            
            
            
                
                    
                    
                    
                
            

        </ul>
    </nav>
    <div class="social-links">
        <ul>
            <li><a href="#"><span class="ion-social-facebook"></span></a></li>
            <li><a href="#"><span class="ion-social-twitter"></span></a></li>
            <li><a href="#"><span class="ion-social-googleplus"></span></a></li>
            <li><a href="#"><span class="ion-social-tumblr"></span></a></li>
        </ul>
    </div>
</div><!--// Mobile menu area end -->

    
        
                
                  
                
            
            
        
    

