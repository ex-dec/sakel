<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Materi &mdash; Sakel</title>

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
                            <a href="/admin/materi" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>Materi</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="#">Materi</a></div>
                            <div class="breadcrumb-item">Kelas</div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (!empty($mapel)) {
                            foreach ($mapel as $index => $mapel): ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <a href="/admin/materi/index.php?mapel_id=<?=$mapel['id']?>&kelas_id=<?=$kelas_id?>" style="text-decoration: none; color: inherit;">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-primary">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4>Mapel</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?= $mapel['name'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach;
                        } else { ?>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center">Data tidak ditemukan</h5>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            </div>
            <?php require_once __DIR__ . '/../layout/footer.php'; ?>
        </div>
    </div>

    <?php include_once __DIR__ . '/../dep/script.php'; ?>
</body>

</html>