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
    <link rel="stylesheet" href="app/libs/adminlte/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="app/libs/adminlte/plugins/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="app/libs/adminlte/plugins/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="app/libs/adminlte/plugins/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini pace-primary">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once('app/views/admin/common/navbar.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once('app/views/admin/common/menu.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <?php include_once('app/views/admin/pages/article_form.php') ?>
        <!-- /.content-wrapper -->

        <?php include_once('app/views/admin/common/footer.php') ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="app/libs/adminlte/plugins/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="app/libs/adminlte/plugins/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="app/libs/adminlte/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="app/libs/adminlte/plugins/js/jquery.dataTables.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/dataTables.bootstrap4.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/dataTables.responsive.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/responsive.bootstrap4.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/dataTables.buttons.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/buttons.bootstrap4.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/jszip.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/pdfmake.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/vfs_fonts.js"></script>
    <script src="app/libs/adminlte/plugins/js/buttons.html5.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/buttons.print.min.js"></script>
    <script src="app/libs/adminlte/plugins/js/buttons.colVis.min.js"></script>
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
