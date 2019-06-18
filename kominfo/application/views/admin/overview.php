<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pengaduan</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">    
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/third_party/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/third_party/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/third_party/Ionicons/css/ionicons.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/third_party/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome-animation.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/third_party/select2/dist/css/select2.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
        <!-- iCheck -->
        <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css"> -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            
            <?php $this->load->view("admin/_partials/header"); ?>
            
            <?php $this->load->view("admin/_partials/aside"); ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= !empty($title) ? $title  :"Agripay" ?>
                        <small>page</small>
                    </h1>
                   
                </section>

                <!-- Main content -->
                <?php $this->load->view("admin/".$page,!empty($data)?$data:null); ?>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

        <?php $this->load->view("admin/_partials/footer"); ?>    

        </div>
        <!-- ./wrapper -->

        <script src="<?= base_url() ?>assets/third_party/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url() ?>assets/third_party/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/third_party/select2/dist/js/select2.full.min.js"></script>
        
        <!-- DataTables -->
        <script src="<?= base_url() ?>assets/third_party/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/third_party/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
     

        <!-- InputMask -->
        <script src="<?= base_url() ?>assets/js/jquery.mask.min.js"></script>

        <!-- SlimScroll -->
        <script src="<?= base_url() ?>assets/third_party/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>assets/third_party/fastclick/lib/fastclick.js"></script>
        <!-- Sweet Alert -->
        <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
        <script src="<?= base_url() ?>assets/js/custom.js"></script>
        
    </body>
</html>