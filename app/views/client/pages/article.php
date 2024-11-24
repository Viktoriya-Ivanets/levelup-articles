<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> <?= $article['title'] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><?= $article['title'] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between mb-2">
                    <button class="btn btn-primary">Prev</button>
                    <button class="btn btn-primary">Next</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body"><?= $article['content'] ?></div>
                        <div class="card-footer d-flex justify-content-between text-primary w-100 pt-2 pb-2 pl-4">
                            <div class="w-50"><?= $article['user'] ?></div>
                            <div class="w-50 text-right"><?= $article['created_at'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
