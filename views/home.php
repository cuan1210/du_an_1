<?php require_once 'layout/header.php' ?>

<?php require_once 'layout/menu.php' ?>

<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner1.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner2.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

        </div>
    </section>

    <!-- service policy area start -->
    <div class="service-policy section-padding">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Giao hàng</h6>
                            <p>Giao hàng miễn phí</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hỗ trợ</h6>
                            <p>Hỗ trợ 24/7 trong ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hoàn tiền</h6>
                            <p>Hoàn tiền trong 30 ngày khi lỗi</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Thanh toán</h6>
                            <p>Bảo mật thanh toán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->

    <!-- banner statistics area start -->
    <div class="banner_area mt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="<?= BASE_URL . '?act=list-san-pham' ?>"><img src="assets/img/banner/banner1.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="<?= BASE_URL . '?act=list-san-pham' ?>"><img src="assets/img/banner/banner2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>

                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">

                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                                    <!-- product item start -->
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?> ">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                                    if ($tinhNgay->days <= 7) {
                                                    ?>
                                                        <div class="product-label new">
                                                            <span>Mới</span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">Xem chi tiết</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a href="product-details.html"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- <section class="product-banner-statistics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="product-banner-carousel slick-row-10">
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="assets/img/ip1.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">BRACELATES</a></h5>
                                </div>
                            </figure>
                        </div>
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="assets/img/ip1.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">EARRINGS</a></h5>
                                </div>
                            </figure>
                        </div>
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="assets/img/ip1.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">NECJLACES</a></h5>
                                </div>
                            </figure>
                        </div>
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="assets/img/ip1.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">RINGS</a></h5>
                                </div>
                            </figure>
                        </div>
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="assets/img/ip1.jpg" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="#">PEARLS</a></h5>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm đang khuyến mãi</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
        
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanPham as $key => $sanPham): ?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>">
                                        <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                        // Hiển thị nhãn "Mới" nếu sản phẩm nhập trong vòng 7 ngày
                                        if ($tinhNgay->days <= 7):
                                        ?>
                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($sanPham['gia_khuyen_mai']): ?>
                                            <div class="product-label discount">
                                                <span>Giảm giá</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="cart-hover">
                                        <button class="btn btn-cart">Xem chi tiết</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">


                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                            <?= $sanPham['ten_san_pham'] ?>
                                        </a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']): ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) ?></del></span>
                                        <?php else: ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- latest blog area start -->
    <section class="latest-blog-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Tin Tức Hôm Nay</h2>
                        
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/tin-tuc-1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>22/02/2025 | <a href="#">PhoneStore</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">The Gioi Di Dong - Sự Lựa Chọn Thông Minh</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/tin-tuc-1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>22/02/2025 | <a href="#">PhoneStore</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">The Gioi Di Dong - Sự Lựa Chọn Thông Minh</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="#">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/tin-tuc-1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>22/02/2025 | <a href="#">PhoneStore</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">The Gioi Di Dong - Sự Lựa Chọn Thông Minh</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="#">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/tin-tuc-1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>22/02/2025 | <a href="#">PhoneStore</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">The Gioi Di Dong - Sự Lựa Chọn Thông Minh</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="#">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/tin-tuc-1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>22/02/2025 | <a href="#">PhoneStore</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">The Gioi Di Dong - Sự Lựa Chọn Thông Minh</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
                                            
</main>



<!-- offcanvas mini cart start -->
<!-- <div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-1.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$100.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-2.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$80.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>$300.00</strong></span>
                        </li>
                        <li>
                            <span>Eco Tax (-2.00)</span>
                            <span><strong>$10.00</strong></span>
                        </li>
                        <li>
                            <span>VAT (20%)</span>
                            <span><strong>$60.00</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>$370.00</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php' ?>

<style>

.product-item img {
    width: 80%; /* Điều chỉnh tỷ lệ ảnh theo ý muốn */
    height: auto; /* Giữ tỷ lệ hình ảnh */
    margin: 0 auto; /* Căn giữa ảnh */
}

.product-item {
    width: calc(100% / 5); /* Mỗi sản phẩm chiếm 1/5 chiều rộng */
}

</style>