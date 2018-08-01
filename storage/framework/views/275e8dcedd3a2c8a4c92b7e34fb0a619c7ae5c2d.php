<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo e(route('home')); ?>" target="_blank">
                    <i class="fa fa-home"></i> <span>Visit Site</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('categories.index')); ?>"><i class="fa fa-circle-o"></i> All Categories</a></li>
                    <li><a href="<?php echo e(route('categories.create')); ?>"><i class="fa fa-circle-o"></i> Add New Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-image-o"></i>
                    <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('media.index')); ?>"><i class="fa fa-circle-o"></i> All Media</a></li>
                    <li><a href="<?php echo e(route('media.create')); ?>"><i class="fa fa-circle-o"></i> Add New Media</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-clipboard"></i>

                    <span>Posts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('post.index')); ?>"><i class="fa fa-circle-o"></i> All Posts</a></li>
                    <li><a href="<?php echo e(route('post.create')); ?>"><i class="fa fa-circle-o"></i> Add New Post</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-o"></i>

                    <span>Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('page.index')); ?>"><i class="fa fa-circle-o"></i> All Pages</a></li>
                    <li><a href="<?php echo e(route('page.create')); ?>"><i class="fa fa-circle-o"></i> Add New Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bars" aria-hidden="true"></i>


                    <span>Main Menu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('menu.index')); ?>"><i class="fa fa-circle-o"></i> All Menu Items</a></li>
                    <li><a href="<?php echo e(route('menu.create')); ?>"><i class="fa fa-circle-o"></i> Add New Item</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('sitemeta.show')); ?>">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                    <span>Site Meta</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('messages')); ?>">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <span>Messages</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>