<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Siswa &mdash; Sakel</title>

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
                        <h1>Siswa</h1>
                        <div class="section-header-button">
                            <a href="/admin/siswa/create" class="btn btn-primary">Tambahkan Baru</a>
                        </div>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Siswa</a></div>
                            <div class="breadcrumb-item">Semua Siswa</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Siswa</h2>
                        <p class="section-lead">
                            Anda dapat mengelola semua Siswa disini.
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
                                                    <th>Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php foreach ($data as $index => $u): ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td><?= $u['nis'] ?></td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1"><?= $u['name'] ?></div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-primary"><?= $u['kelas_name'] ?></div>
                                                        </td>
                                                        <td>
                                                            <a href="/admin/siswa/edit?id=<?= $u['id'] ?>" class="btn btn-primary">Edit</a>
                                                            <form action="/admin/siswa/delete" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                                <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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
            <?php require_once __DIR__ . '/../layout/footer.php'; ?>
        </div>
    </div>

    <?php include_once __DIR__ . '/../dep/script.php'; ?>
</body>

</html>