<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $name ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= Router::url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $name ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header text-center">
                            <h3 class="card-title"><?= $name . ' ' . $user['login'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if (!isset($user)): ?>
                            <form action="<?= Router::url('admin/users/store') ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" class="form-control" id="login" placeholder="Enter user login">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Password Confirmation</label>
                                        <input type="password" name="password_confirm" class="form-control" id="confirmPassword" placeholder="Re-enter password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <form action="<?= Router::url('admin/users/update') ?>" method="post">
                                <div class="card-body">
                                    <!-- Hidden field for user ID -->
                                    <input type="hidden" name="userId" value="<?= $user['id'] ?>">

                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" class="form-control" id="login" value="<?= $user['login'] ?>" placeholder="Enter user login">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old Password</label>
                                        <input type="password" name="oldPassword" class="form-control" id="exampleInputPassword1" placeholder="Enter an old password">
                                    </div>
                                    <div class="form-group">
                                        <label for="newPassword">New Password</label>
                                        <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter a new password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Password Confirmation</label>
                                        <input type="password" name="passwordConfirm" class="form-control" id="confirmPassword" placeholder="Re-enter new password">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
