<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>i</b>f</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Wak</b>Dhoel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/img/avatar6.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->session->userdata("nama") ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url() ?>assets/img/avatar6.png" class="img-circle" alt="User Image">

                            <p>
                                <?= $this->session->userdata("nama") ?>
                                <small>IP <?= $_SERVER['REMOTE_ADDR'] ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                            <div class="pull-right">
                                <a href="<?= base_url() ?>logout" class="btn btn-default btn-flat">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>