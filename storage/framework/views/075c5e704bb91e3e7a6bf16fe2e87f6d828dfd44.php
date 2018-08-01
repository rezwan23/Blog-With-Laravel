
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
<?php $__env->startSection('head'); ?>
<?php echo $__env->yieldSection(); ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/morris.js/morris.css')); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/jvectormap/jquery-jvectormap.css')); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/style.css')); ?>">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini"
<?php if(\Illuminate\Support\Facades\Route::currentRouteName()=='dashboard'): ?>
onload=" startTime()"
<?php endif; ?>
>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>P</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>Panel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <span class="hidden-xs"><?php echo $__env->yieldContent('name'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a
                                            href="<?php echo e(route('logout')); ?>"
                                            class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit()"
                                    >Sign out</a>
                                    <form method="post" id="logout-form" action="<?php echo e(route('logout')); ?>" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>