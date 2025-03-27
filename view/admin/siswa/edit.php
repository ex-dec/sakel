<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Siswa &mdash; Sakel</title>

    <?php include_once __DIR__ . '/../../dep/head.php'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php require_once __DIR__ . '/../../layout/navbar.php'; ?>
            <?php require_once __DIR__ . '/../layout/sidebar.php'; ?>


            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="/admin/siswa" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Edit Siswa</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Siswa</a></div>
                            <div class="breadcrumb-item">Edit Siswa</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Edit Siswa</h2>
                        <p class="section-lead">
                            Silahkan isi form berikut untuk mengedit Siswa.
                        </p>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="/admin/siswa/update?id=<?= $siswa['id'] ?>">
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="name">Nama</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="name" id="name" value="<?= $siswa['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nis">NIS</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="nis" id="nis" value="<?= $siswa['nis'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <select class="form-control selectric" name="kelas_id">
                                                        <?php foreach ($kelas as $k) : ?>
                                                            <option value="<?= $k['id'] ?>"
                                                                <?= ($siswa['kelas_id'] == $k['id']) ? 'selected' : '' ?>>
                                                                <?= $k['name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <button class="btn btn-primary" type="submit">Edit Siswa</button>
                                                </div>
                                            </div>
                                        </form>
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