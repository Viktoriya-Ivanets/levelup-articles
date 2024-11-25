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
                            <h3 class="card-title"> <?= $name . ' ' . $article['title'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if (!isset($article)): ?>
                            <form action="<?= Router::url('admin/articles/store') ?>" method="post">
                                <div class="card-body">
                                    <input type="hidden" name="userId" value="<?= $userId ?>">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" value="<?= $oldInput['title'] ?>" placeholder="Enter article title">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="content" class="form-control" rows="3" placeholder="Enter text of article..."><?= $oldInput['content'] ?></textarea>
                                    </div>
                                    <?php if (isset($errors)): ?>
                                        <?php foreach ($errors as $error): ?>
                                            <div class="text-danger"><?= $error ?></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    <a href="<?= Router::url('admin/articles') ?>">
                                        <div class="btn btn-danger w-100 mt-2">Cancel</div>
                                    </a>
                                </div>
                            </form>
                        <?php else: ?>
                            <form action="<?= Router::url('admin/articles/update') ?>" method="post">
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" value="<?= $article['title'] ?>" placeholder=" Enter article title">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="content" class="form-control" rows="3" placeholder="Enter text of article..."><?= $article['content'] ?></textarea>
                                    </div>
                                    <?php if (isset($errors)): ?>
                                        <?php foreach ($errors as $error): ?>
                                            <div class="text-danger"><?= $error ?></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    <a href="<?= Router::url('admin/articles') ?>">
                                        <div class="btn btn-danger w-100 mt-2">Cancel</div>
                                    </a>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
