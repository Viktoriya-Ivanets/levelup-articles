<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article Admin | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="public/vendor/adminlte/plugins/icheck-bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/vendor/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <h1 class="card-header text-center">Article<b>Admin</b></h1>
            <div class="card-body">
                <p class="login-box-msg">Login to Administration Panel</p>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="login" class="form-control" placeholder="Login">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa-solid fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="public/vendor/adminlte/plugins/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/vendor/adminlte/plugins/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/vendor/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
