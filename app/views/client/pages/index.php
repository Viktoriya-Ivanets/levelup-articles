<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> All articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?php foreach ($articles as $article): ?>
                        <?php if ($article['id'] % 2 !== 0): ?>
                            <a href="<?= Router::url('article/' . $article['id']) ?>">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h4 class="m-0"><?= $article['title'] ?></h4>
                                    </div>
                                    <div class="card-body d-flex justify-content-between text-primary w-100 pt-2 pb-2 pl-4">
                                        <div class="w-50"><?= $article['user'] ?></div>
                                        <div class="w-50 text-right"><?= $article['created_at'] ?></div>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php foreach ($articles as $article): ?>
                        <?php if ($article['id'] % 2 === 0): ?>
                            <a href="<?= Router::url('article/' . $article['id']) ?>">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h4 class="m-0"><?= $article['title'] ?></h4>
                                    </div>
                                    <div class="card-body d-flex justify-content-between text-primary w-100 pt-2 pb-2 pl-4">
                                        <div class="w-50"><?= $article['user'] ?></div>
                                        <div class="w-50 text-right"><?= $article['created_at'] ?></div>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
