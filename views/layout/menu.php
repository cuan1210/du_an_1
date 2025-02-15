<!-- Start Header Area -->
    <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?= BASE_URL . '?act=trangchu' ?>">
                                    <img src="assets/img/logo/phone.png" alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-5 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li><a href="?act=trangchu">Trang chủ</i></a>

                                            </li>
                                            <li><a href="#">Giới thiệu</a></li>

                                            <li><a href="?act=list-san-pham">Sản phẩm</a>

                                            </li>

                                            <li><a href="#">Tin tức</a></li>

                                            <li><a href="#">Liên hệ</a></li>

                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-5">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <a href="#">
                                                <div class="text-center">
                                                    <i class="pe-7s-user"></i>
                                                </div>
                                                <div class="user-email" style="font-size: 14px; color: #333;">
                                                    <?php if (isset($_SESSION['user_clinet'])) {
                                                        echo $_SESSION['user_clinet'];
                                                    } ?>
                                                </div>
                                            </a>
                                            <ul class="dropdown-list">
                                                <?php if (!isset($_SESSION['user_clinet'])) { ?>
                                                    <li><a href="<?= BASE_URL . '/?act=login' ?>">Đăng Nhập</a></li>
                                                    <li><a href="<?= BASE_URL . '/?act=register' ?>">Đăng Ký</a></li>
                                                <?php } else { ?>
                                                    <li><a href="<?= BASE_URL . '/?act=form-sua-thong-tin' ?>">Tài Khoản</a>
                                                    </li>
                                                    <li><a href="<?= BASE_URL . '/?act=lich-su-mua-hang' ?>">Đơn Hàng</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" onclick="confirmLogout()">Đăng xuất</a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?= BASE_URL ?>?act=gio-hang" class="minicart-btn">
                                                <i class="fa fa-cart-plus"></i>(<?= isset($tongDonHang) ? $tongDonHang : 0 ?>)
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="header-search-container">
                                    <form action="" method="GET" class="d-flex">
                                        <input type="text" name="keyword" class="form-control"
                                            value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
                                            placeholder="Tìm kiếm sản phẩm..." required>
                                        <button type="submit" class="btn btn-primary ms-2">Tìm</button>
                                    </form>
                                </div>

                                
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

    </header>
    <script>
        function confirmLogout() {
            let confirmAction = confirm(
                "Bạn có chắc chắn muốn đăng xuất không?");
            if (confirmAction) {
                window.location.href =
                    "<?= BASE_URL . '/?act=logout-clinet' ?>";
            }
        }
    </script>
    <!-- end Header Area -->