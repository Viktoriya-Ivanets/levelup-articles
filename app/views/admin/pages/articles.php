<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Articles</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Card Header -->
                        <div class="card-header">
                            <button class="btn btn-primary">Add article</button>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $article): ?>
                                        <tr>
                                            <td><?= $article['id'] ?></td>
                                            <td><?= $article['title'] ?></td>
                                            <td><?= $article['content'] ?></td>
                                            <td><?= $article['user'] ?></td>
                                            <td><?= $article['created_at'] ?></td>
                                            <td><?= $article['updated_at'] ?></td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <button class="btn btn-sm btn-primary mr-2"> <span class="fa-solid fa-pen mr-2"></span> Edit</button>
                                                    <a href="<?= BASE_URL . 'admin/articles/delete/' . $article['id'] ?>"><button class="btn btn-sm btn-danger"> <span class="fa-solid fa-trash mr-2"></span> Delete</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Card Body -->
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container Fluid -->
    </section>
    <!-- End Main Content -->
</div>
