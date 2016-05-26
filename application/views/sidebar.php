<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('fullname') ?></p>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo @$active[0] ?>"><a href="<?php echo site_url('admin/summary') ?>"><i class="fa fa-list"></i> <span>Summary</span></a></li>
            <li class="<?php echo @$active[1] ?>"><a href="<?php echo site_url('admin/user') ?>"><i class="fa fa-users"></i><span>Users</span></a></li>
            <li class="<?php echo @$active[2] ?>"><a href="<?php echo site_url('admin/journal') ?>"><i class="fa fa-book"></i><span>Journals</span></a></li>
            <li class="<?php echo @$active[3] ?>"><a href="<?php echo site_url('admin/course') ?>"><i class="fa fa-pencil"></i><span>Courses</span></a></li>
            <li class="<?php echo @$active[4] ?>"><a href="<?php echo site_url('admin/discussion') ?>"><i class="fa fa-comments"></i><span>Group Discussion</span></a></li>
            <li class="<?php echo @$active[5] ?>"><a href="<?php echo site_url('admin/cop') ?>"><i class="fa fa-commenting"></i><span>COP</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>