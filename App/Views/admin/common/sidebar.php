
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header"></li>
            <li  id = "dashboard-link" class="sidebar-link">
                <a href="<?php echo url('/admin');?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                </a>
            </li>
            <li  id = "users-link" class="sidebar-link">
                <a href="<?php echo url('admin/users');?>">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li  id = "categories-link" class="sidebar-link">
              <a href="<?php echo url('admin/categories');?>">
                <i class="fa fa-th"></i>
                <span>Categories</span>
              </a>
            </li>
            <li  id = "jobs-link" class="sidebar-link">
                <a href="<?php echo url('admin/jobs');?>">
                    <i class="fa fa-th"></i>
                    <span>Jobs</span>
                </a>
            </li>
            <li  id = "sittings-link" class="sidebar-link">
                <a href="<?php echo url('admin/sittings');?>">
                    <i class="fa fa-th"></i>
                    <span>sittings</span>
                </a>
            </li>
            <li  id = "ads-link" class="sidebar-link">
                <a href="<?php echo url('admin/ads');?>">
                    <i class="fa fa-th"></i>
                    <span>Ads</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>