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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=tin-tuc' ?>">Tin tức</a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news-main-wrapper section-padding">
        <div class="container">
            <h1 class="text-center mb-5">Danh sách tin tức</h1>
            <div class="row">
                <?php foreach($listTinTuc as $tinTuc) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                        <img src="<?= $tinTuc['hinh_anh'] ?>" class="card-img-top" alt="<?= $tinTuc['hinh_anh'] ?>" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body">
                                <h5 class="card-title"><?= $tinTuc['name'] ?></h5>
                                <p class="card-text"><?= substr($tinTuc['thong_tin'], 0, 100) ?>...</p>
                                <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc&id=' . $tinTuc['id'] ?>" class="btn btn-primary">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php 
    require_once 'layout/footer.php'; 
?>