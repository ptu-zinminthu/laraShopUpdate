<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(access()->user()->picture); ?>" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p><?php echo e(access()->user()->name); ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('strings.backend.general.status.online')); ?></a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        <?php echo e(Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form'])); ?>

            <div class="input-group">
                <?php echo e(Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')])); ?>


                  <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span><!--input-group-btn-->
            </div><!--input-group-->
        <?php echo e(Form::close()); ?>

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('menus.backend.sidebar.general')); ?></li>

            <li class="<?php echo e(Active::pattern('admin/dashboard')); ?>">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                   
                    <span><?php echo e(trans('menus.backend.sidebar.dashboard')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Active::pattern('admin/category/')); ?>">
                <a href="<?php echo e(route('admin.categories.index')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="<?php echo e(Active::pattern('admin/product/')); ?>">
                <a href="<?php echo e(route('admin.products.index')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Product</span>
                </a>
            </li>
             <li class="<?php echo e(Active::pattern('admin/order/')); ?>">
                <a href="<?php echo e(route('admin.orders.index')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class="<?php echo e(Active::pattern('admin/pages/')); ?>">
                <a href="<?php echo e(route('admin.pages.index')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Pages</span>
                </a>
            </li>
            <?php if (access()->allowMultiple(['manage-users', 'manage-roles'])): ?>
                <li class="<?php echo e(Active::pattern('admin/access/*')); ?> treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span><?php echo e(trans('menus.backend.access.title')); ?></span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu <?php echo e(Active::pattern('admin/access/*', 'menu-open')); ?>" style="display: none; <?php echo e(Active::pattern('admin/access/*', 'display: block;')); ?>">
                        <?php if (access()->allow('manage-users')): ?>
                            <li class="<?php echo e(Active::pattern('admin/access/user*')); ?>">
                                <a href="<?php echo e(route('admin.access.user.index')); ?>">
                                    <i class="fa fa-circle-o"></i>
                                    <span><?php echo e(trans('labels.backend.access.users.management')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (access()->allow('manage-roles')): ?>
                            <li class="<?php echo e(Active::pattern('admin/access/role*')); ?>">
                                <a href="<?php echo e(route('admin.access.role.index')); ?>">
                                    <i class="fa fa-circle-o"></i>
                                    <span><?php echo e(trans('labels.backend.access.roles.management')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="header"><?php echo e(trans('menus.backend.sidebar.system')); ?></li>

            <li class="<?php echo e(Active::pattern('admin/log-viewer*')); ?> treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span><?php echo e(trans('menus.backend.log-viewer.main')); ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu <?php echo e(Active::pattern('admin/log-viewer*', 'menu-open')); ?>" style="display: none; <?php echo e(Active::pattern('admin/log-viewer*', 'display: block;')); ?>">
                    <li class="<?php echo e(Active::pattern('admin/log-viewer')); ?>">
                        <a href="<?php echo e(route('admin.log-viewer::dashboard')); ?>">
                            <i class="fa fa-circle-o"></i>
                            <span><?php echo e(trans('menus.backend.log-viewer.dashboard')); ?></span>
                        </a>
                    </li>

                    <li class="<?php echo e(Active::pattern('admin/log-viewer/logs')); ?>">
                        <a href="<?php echo e(route('admin.log-viewer::logs.list')); ?>">
                            <i class="fa fa-circle-o"></i>
                            <span><?php echo e(trans('menus.backend.log-viewer.logs')); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
