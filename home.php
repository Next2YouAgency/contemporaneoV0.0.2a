<?php
ob_start();
session_start();
require_once 'cnf/config.php';
if (isset($_GET['LogOff'])) {
    session_destroy();
    include_once 'parts/extra/modal-log-off.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <link rel="apple-touch-icon" sizes="57x57" href="img/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/icons/favicon-16x16.png">
        <link rel="manifest" href="img/icons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="img/icons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <title>Echo System<?php echo VERSION_SYSTEM ?></title>
        <!-- CORE JQuery-->
        <script src="js/jquery.min.js"></script>
        <!--JQuery UI-->
        <script src="js/jquery-ui.min.js"></script>
        <!-- CORE JQUERY-->
        <script src="js/jquery.min.js"></script>
        <!-- CORE BS CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- CORE JS BOOTSTRAP-->
        <script src="js/bootstrap.min.js"></script>
        <!--Responsive-->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--Core CSS do BS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="css/AdminLTE.css">
        <!--Skin-->
        <link rel="stylesheet" href="css/skins/_all-skins.min.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php
    session_start();
    if (isset($_SESSION['Login'])) {
        if (isset($_GET['MudarSenha'])) {
            $UsuarioAlterarSenha[nome] = $_POST['NomeUsuario'];
            $UsuarioAlterarSenha[id] = $_POST['IdUsuario'];
        }
//    session_destroy();
        if (isset($_GET['SessionExpired'])) {
            include_once 'parts/extra/modal-session-expired.php';
        }
        $now = time();
        $nowExibir = date('H:i:s');
        if ($now > $_SESSION['EXPIRE']) {
            ?>
            <meta http-equiv="refresh" content="0;home.php?SessionExpired">
            <?php
        }
        ?>
        <body class="hold-transition skin-red sidebar-mini">
            <div class="wrapper">
                <?php include'parts/pages/Header.php'; ?>
                <!-- Left side column. contains the logo and sidebar -->
                <?php include 'parts/Menu.php'; ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Painel de Controle
                            <small><?php echo date('d/m/Y') ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active">
                                <?php
                                if (!isset($_GET['acesso'])) {
                                    echo '<span class="lead">Início</span>';
                                } else {
                                    if ($_GET['acesso'] == "Home") {
                                        echo '<span class="lead">Página Inicial</span>';
                                    } else {
                                        echo '<span class="lead">' . str_replace('_', ' ', $_GET['acesso']) . "</span>";
                                    }
                                }
                                ?>
                            </li>
                        </ol>
                    </section>

                    <!-- Conteúdo Principal -->
                    <section class="content">
                        <!-- Main row -->
                        <div class="row">
                            <?php
                            if (isset($_GET['acesso'])) {
                                $acesso = $_GET['acesso'];
                                switch ($acesso) {
                                    case $acesso: include'pages/' . $acesso . '.php';
                                        break;
                                    default:
                                        break;
                                }
                            } else {
                                include 'pages/Home.php';
                            }
                            ?>
                        </div>
                        <!-- /.row (main row) -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> <?php echo VERSION_SYSTEM ?>
                    </div>
                    <strong>Copyright &copy; 2017-2018 <a href="http://n2y.com.br" target="new">Next 2 You</a>.</strong> All rights
                    reserved.
                </footer>

                <!-- Control Sidebar -->

            </div>
            <!-- ./wrapper -->
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- daterangepicker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
            <script src="plugins/daterangepicker/daterangepicker.js"></script>
            <!-- datepicker -->
            <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <!-- Slimscroll -->
            <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="js/app.min.js"></script>

        </body>
    </html>
    <?php
}else{
    include_once 'parts/extra/modal-session-end.php';
}