<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>User &mdash; Sakel</title>

    <?php include_once __DIR__ . '/../dep/head.php'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php require_once __DIR__ . '/../layout/navbar.php'; ?>
            <?php require_once __DIR__ . '/../admin/layout/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>User</h1>
                        <div class="section-header-button">
                            <a href="/admin/user/create" class="btn btn-primary">Tambahkan Baru</a>
                        </div>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">User</a></div>
                            <div class="breadcrumb-item">Semua User</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">User</h2>
                        <p class="section-lead">
                            Anda dapat mengelola semua user disini.
                        </p>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Role</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php foreach ($data as $u): ?>
                                                    <tr>
                                                        <td><?= $u['id'] ?></td>
                                                        <td><?= $u['nis'] ?></td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1"><?= $u['name'] ?></div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-primary"><?= $u['role_name'] ?></div>
                                                        </td>
                                                        <td>
                                                            <a href="/admin/user/edit?id=<?= $u['id'] ?>" class="btn btn-primary">Edit</a>
                                                            <form action="/admin/user/delete" method="POST" style="display:inline;" onsubmit="return confirm('Hapus?')">
                                                                <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <!-- <tr>
                                                    <td>1
                                                    </td>
                                                    <td>
                                                        <a href="#">Web Developer</a>
                                                    </td>
                                                    <td>
                                                        <a href="#">
                                                            <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                            <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-primary">Published</div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Edit</a>
                                                        <a href="#" class="btn btn-danger">Hapus</a>
                                                </tr> -->
                                            </table>
                                        </div>
                                        <!-- <div class="float-right">
                                            <nav>
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>User</h1>
                    </div>
                    <a href="/user/create">Tambah User</a>
                    <table border="1" cellpadding="5">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nis</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                        <?php foreach ($data as $u): ?>
                            <tr>
                                <td><?= $u['id'] ?></td>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['nis'] ?></td>
                                <td><?= $u['role_name'] ?? '-' ?></td>
                                <td>
                                    <a href="/user/edit?id=<?= $u['id'] ?>">Edit</a> |
                                    <form action="/user/delete" method="POST" style="display:inline;" onsubmit="return confirm('Hapus?')">
                                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                        <button type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </section>
            </div>
            <?php require_once __DIR__ . '/../layout/footer.php'; ?>
        </div>
    </div>

    <?php include_once __DIR__ . '/../dep/script.php'; ?>
</body>

</html>