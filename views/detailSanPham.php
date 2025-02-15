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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=list-san-pham`' ?>">Sản phẩm</a></li>
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
                                <div class="product-details-des">
                                    <h3 class="product-name"><?= $sanPham['ten_san_pham'] ?></h3>
                                    <div class="manufacturer-name">
                                        <strong>Danh mục:</strong> <a href="#"><?= $sanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <div class="ratings d-flex">
                                        <div class="pro-review">
                                            <?php $countComment = count($listBinhLuan); ?>
                                            <span><?= $countComment . ' bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                        <span
                                            class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . ''; ?></span>
                                        <span
                                            class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ''; ?></del></span>
                                        <?php } else { ?>
                                        <span
                                            class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . ''; ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanPham['so_luong'] . ' trong kho' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>
                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                                                <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2">Thêm giỏ hàng</button>
                                            </div>
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
                                                    <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="user profile">
                                                </div>

                                                <div class="review-box">
                                                    <div class="post-author">
                                                        <p><span><?= $binhLuan['ho_ten'] ?> -
                                                            </span><?= $binhLuan['ngay_dang'] ?></p>
                                                    </div>
                                                    <p><?= $binhLuan['noi_dung'] ?></p>
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
                                            
                                            <?php if(!isset($_SESSION['user_clinet'])) { ?>
                                                <p class="text-danger text-center">Vui lòng đăng nhập để gửi bình luận</p><br>
                                            <?php } else { ?>
                                            <form action="<?= BASE_URL . '?act=gui-binh-luan' ?>" method="POST" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user_client_id'] ?>">
                                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                        <textarea placeholder="Bình luận *" id="noi_dung" name="noi_dung" class="form-control" required></textarea>
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

    <!-- related products area end -->
</main>





<?php require_once 'layout/footer.php'; ?>