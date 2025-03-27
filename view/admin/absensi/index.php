<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>User &mdash; Sakel</title>

    <?php include_once __DIR__ . '/../../dep/head.php'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php require_once __DIR__ . '/../../layout/navbar.php'; ?>
            <?php require_once __DIR__ . '/../layout/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="/admin/absensi/tgl?kelas_id=<?= $kelas_id ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Absensi</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Absensi</a></div>
                            <div class="breadcrumb-item">Semua Absensi</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Absensi Kelas <?= $kelas['name'] ?></h2>
                        <p class="section-lead">
                            <?= date('d F Y', strtotime($tgl)) ?>
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
                                                    <th>Kehadiran</th>
                                                </tr>
                                                <?php foreach ($data as $index => $u): ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td><?= $u['nis'] ?></td>
                                                        <td>
                                                            <a href="#">
                                                                <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                                <div class="d-inline-block ml-1"><?= $u['siswa_name'] ?></div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="badge  <?php echo ($u['status'] === 'hadir') ? "badge-primary" : "badge-danger" ?>"><?= $u['status'] ?></div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php require_once __DIR__ . '/../../layout/footer.php'; ?>
        </div>
    </div>
    <?php include_once __DIR__ . '/../../dep/script.php'; ?>
</body>

</html>