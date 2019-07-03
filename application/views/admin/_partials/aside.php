<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/img/avatar6.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata("nama") ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <!-- <li>
                <a href="<?= base_url() ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li> -->

            <li>
                <a href="<?= base_url() ?>pengaduan">
                    <i class="fa fa-file"></i> <span>Pengaduan</span>
                </a>
            </li>
           
<!-- 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url() ?>user"><i class="fa fa-circle-o"></i> Daftar User</a></li>
                    <li><a href="<?= base_url() ?>balance"><i class="fa fa-circle-o"></i> Saldo</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url() ?>merchant">
                    <i class="fa fa-shopping-cart"></i> <span>Merchant</span>
                </a>
            </li> -->


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->