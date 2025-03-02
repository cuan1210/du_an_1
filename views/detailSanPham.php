<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=list-san-pham' ?>">Sản
                                        phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <!-- Chỉ hiển thị ảnh chính -->
                                    <div class="pro-large-img">
                                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product-details" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="product-details">
                                    <div class="product-name">
                                        <h1><?= $sanPham['ten_san_pham'] ?></h1>
                                    </div>
                                    <div class="manufacturer-name">
                                        <div class="product-name">
                                            <h3>Danh Mục: <?= $sanPham['ten_danh_muc'] ?></h3>
                                        </div>
                                        <?php $countComment = count($listBinhLuan); ?>
                                        <h5><?= $countComment . 'bình luận' ?></h5>

                                        <div class="price-box" style="margin-top: 17px;">
                                            <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                <span class="price-regular" style="font-size: 24px; font-weight: bold; color: red;">
                                                    <?= formatPrice($sanPham['gia_khuyen_mai']) . ''; ?>
                                                </span>
                                                <span class="price-old" style="font-size: 18px; color: gray;">
                                                    <del><?= formatPrice($sanPham['gia_san_pham']) . ''; ?></del>
                                                </span>
                                            <?php } else { ?>
                                                <span class="price-regular" style="font-size: 24px; font-weight: bold; color: red;">
                                                    <?= formatPrice($sanPham['gia_san_pham']) . ''; ?>
                                                </span>
                                            <?php } ?>
                                        </div>

                                        <div class="availability" style="margin-top: 17px; font-size: 20px;">
                                            <span>Trong kho: <?= $sanPham['so_luong'] ?></span>
                                        </div>
                                        <div class="pro-desc" style="margin-top: 17px; font-size: 20px;">Mô tả: <?= $sanPham['mo_ta'] ?></div>
                                        <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post" class="d-flex align-items-center gap-3 flex-wrap">
                                            <div class="d-flex align-items-center gap-2" style="margin-top:20px; font-size: 20px;">
                                                <div>Số lượng:</div>
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">

                                                <div class="d-flex align-items-center border rounded px-2" style="width: 130px;">
                                                    <button type="button" class="btn btn-outline-secondary qty-btn decrease px-2">−</button>
                                                    <input type="text" class="form-control text-center border-0 flex-grow-1"
                                                        value="1" name="so_luong" min="1" max="<?= $sanPham['so_luong'] ?>" id="quantity">
                                                    <button type="button" class="btn btn-outline-secondary qty-btn increase px-2">+</button>
                                                </div>
                                            </div>

                                            <div class="border rounded p-2" style="margin-top:20px; font-size: 20px;">
                                                <?php if ($sanPham['so_luong'] > 0) { ?>
                                                    <button class="btn btn-warning fw-bold w-100">Thêm vào giỏ hàng</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger fw-bold w-100">Đã hết hàng</button>
                                                <?php } ?>
                                            </div>

                                        </form>






                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận
                                                    (<?= $countComment ?>)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_three">
                                                <?php foreach ($listBinhLuan as $binhLuan) { ?>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="">
                                                        </div>
                                                        <div class="review-box">

                                                            <div class="post-author">
                                                                <p><span><?= $binhLuan['ho_ten'] ?> -
                                                                    </span><?= $binhLuan['ngay_dang'] ?></p>
                                                            </div>
                                                            <p><?= $binhLuan['noi_dung'] ?></p>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php } ?>

                                        <div>
                                            <?php if (isset($_SESSION['success_message'])): ?>
                                                <div class="alert alert-success">
                                                    <?= $_SESSION['success_message'] ?>
                                                </div>
                                                <?php unset($_SESSION['success_message']); ?>
                                            <?php endif; ?>

                                            <?php if (isset($_SESSION['error_message'])): ?>
                                                <div class="alert alert-danger">
                                                    <?= $_SESSION['error_message'] ?>
                                                </div>
                                                <?php unset($_SESSION['error_message']); ?>
                                            <?php endif; ?>

                                            <label>Bình luận:</label>
                                        </div>

                                        <?php if (!isset($_SESSION['user_clinet'])) { ?>
                                            <p class="text-danger text-center">Vui lòng đăng nhập để gửi bình luận</p><br>
                                        <?php } else { ?>
                                            <form action="<?= BASE_URL . '?act=gui-binh-luan' ?>" method="POST"
                                                class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <input type="hidden" name="tai_khoan_id"
                                                            value="<?= $_SESSION['user_client_id'] ?>">
                                                        <input type="hidden" name="san_pham_id"
                                                            value="<?= $sanPham['id'] ?>">
                                                        <textarea placeholder="Bình luận *" id="noi_dung" name="noi_dung"
                                                            class="form-control" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Gửi bình luận</button>
                                                </div>
                                            </form>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <!-- related products area start -->
    <div class="related-products section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h4 class="section-title-text">Sản Phẩm Liên Quan</h4>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($listSanPhamLienQuan as $sanPhamLienQuan) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="product-thumb position-relative">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPhamLienQuan['id']; ?>">
                                    <img src="<?= BASE_URL . $sanPhamLienQuan['hinh_anh']; ?>"
                                        alt="<?= $sanPhamLienQuan['ten_san_pham']; ?>" class="img-fluid">
                                </a>

                            </div>
                            <div class="product-info text-center">
                                <h6 class="product-name">
                                    <a
                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPhamLienQuan['id']; ?>">
                                        <?= $sanPhamLienQuan['ten_san_pham']; ?>
                                    </a>
                                </h6>
                                <div class="price-box">
                                    <?php if ($sanPhamLienQuan['gia_khuyen_mai']) { ?>
                                        <span
                                            class="price-regular"><?= formatPrice($sanPhamLienQuan['gia_khuyen_mai']); ?></span>
                                        <span
                                            class="price-old"><del><?= formatPrice($sanPhamLienQuan['gia_san_pham']); ?></del></span>
                                    <?php } else { ?>
                                        <span class="price-regular"><?= formatPrice($sanPhamLienQuan['gia_san_pham']); ?></span>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <style>
        .section-title-text {
            font-size: 24px;
            font-weight: bold;
            color: #6c4d23;
        }

        .product-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            transition: 0.3s;
        }

        .product-item:hover {
            transform: translateY(-5px);
        }

        .product-thumb {
            position: relative;
        }

        .badge-new {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #c4a060;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 5px;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        .price-regular {
            font-size: 16px;
            color: #c4a060;
            font-weight: bold;
        }
    </style>

    <!-- related products area end -->


    <!-- related products area end -->
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const decreaseBtn = document.querySelector(".decrease");
        const increaseBtn = document.querySelector(".increase");
        const quantityInput = document.getElementById("quantity");

        let min = parseInt(quantityInput.min);
        let max = parseInt(quantityInput.max);

        decreaseBtn.addEventListener("click", function() {
            let value = parseInt(quantityInput.value);
            if (value > min) {
                quantityInput.value = value - 1;
            }
        });

        increaseBtn.addEventListener("click", function() {
            let value = parseInt(quantityInput.value);
            if (value < max) {
                quantityInput.value = value + 1;
            }
        });

        quantityInput.addEventListener("input", function() {
            let value = parseInt(quantityInput.value);
            if (isNaN(value) || value < min) {
                quantityInput.value = min;
            } else if (value > max) {
                quantityInput.value = max;
            }
        });
    });
</script>






<?php require_once 'layout/footer.php'; ?>