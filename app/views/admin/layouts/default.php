<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ArticleAdmin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= ADMIN_LTE_DIST_CSS . 'adminlte.min.css' ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= ADMIN_LTE_PLUGINS_CSS . 'dataTables.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= ADMIN_LTE_PLUGINS_CSS . 'responsive.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= ADMIN_LTE_PLUGINS_CSS . 'buttons.bootstrap4.min.css' ?>">
</head>

<body class="hold-transition sidebar-mini pace-primary">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once(ADMIN_COMMON_VIEWS . 'navbar.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once(ADMIN_COMMON_VIEWS . 'menu.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <?php include_once(VIEWS . $view . '/pages/' . $page . '.php') ?>
        <!-- /.content-wrapper -->

        <?php include_once(ADMIN_COMMON_VIEWS . 'footer.php') ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'jquery.min.js' ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= ADMIN_LTE_DIST_JS . 'adminlte.min.js' ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'jquery.dataTables.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'dataTables.bootstrap4.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'dataTables.responsive.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'responsive.bootstrap4.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'dataTables.buttons.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'buttons.bootstrap4.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'jszip.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'pdfmake.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'vfs_fonts.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'buttons.html5.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'buttons.print.min.js' ?>"></script>
    <script src="<?= ADMIN_LTE_PLUGINS_JS . 'buttons.colVis.min.js' ?>"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
