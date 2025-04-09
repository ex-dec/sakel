<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Mapel &mdash; Sakel</title>

    <?php include_once __DIR__ . '/../dep/head.php'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php require_once __DIR__ . '/../layout/navbar.php'; ?>
            <?php require_once __DIR__ . '/../layout/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="/admin/mapel" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Mapel Kelas <?=$kelas['name']?></h1>
                        <div class="section-header-button">
                            <a href="/admin/mapel/create?kelas_id=<?=$kelas_id?>" class="btn btn-primary">Tambahkan Baru</a>
                        </div>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Mapel</a></div>
                            <div class="breadcrumb-item">Semua Mapel</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Mapel</h2>
                        <p class="section-lead">
                            Anda dapat mengelola semua Mata Pelajaran disini.
                        </p>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php if (empty($data)) { ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                                    </tr>
                                                <?php }  else {
                                                foreach ($data as $index => $u): ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td>
                                                            <?= $u['name'] ?>
                                                        </td>
                                                        <td>
                                                            <a href="/admin/mapel/edit?id=<?= $u['id'] ?>&kelas_id=<?=$kelas_id?>" class="btn btn-primary">Edit</a>
                                                            <form action="/admin/mapel/delete/index.php" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                                <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                                                
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; }?>
                                            </table>
                                        </div>
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