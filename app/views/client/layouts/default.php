<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles | All articles</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/libs/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once('app/views/client/common/navbar.php') ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <?php include_once('app/views/client/pages/article.php') ?>
        <!-- Footer -->
        <?php include_once('app/views/client/common/footer.php') ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="app/libs/adminlte/plugins/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="app/libs/adminlte/plugins/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="app/libs/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
