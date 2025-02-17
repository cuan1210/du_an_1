<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=tin-tuc' ?>">Tin tức</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết tin tức</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news-detail-wrapper section-padding bg-light">
        <div class="container card shadow p-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <img src="<?= BASE_URL . $tinTucDetail['hinh_anh'] ?>" alt="Hình Ảnh Tin Tức" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-md-6">
                    <h1 class="h3 text-primary mb-3"> <?= htmlspecialchars($tinTucDetail['name']) ?> </h1>
                    <p class="text-muted" style="white-space: pre-wrap; line-height: 1.6; font-size: 1rem;">
                        <?= nl2br(htmlspecialchars($tinTucDetail['thong_tin'])) ?>
                    </p>
                    <a href="<?= BASE_URL . '/?act=tin-tuc' ?>" class="btn btn-outline-primary mt-4 px-4 py-2">
                        <i class="bi bi-arrow-left"></i> Quay Lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'layout/footer.php'; ?>