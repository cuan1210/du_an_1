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
                                            <li><a href="<?= BASE_URL . '?act=gioi-thieu' ?>">Giới thiệu</a></li>

                                            <li><a href="?act=list-san-pham">Sản phẩm</a>

                                            <li><a href="<?= BASE_URL . '?act=tin-tuc' ?>">Tin tức</a></li>

                                            <li><a href="<?= BASE_URL . '?act=lien-he' ?>">Liên hệ</a></li>

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
                                <div class="header-search-container">
                                    <form action="" method="GET" class="d-flex">
                                        <input type="text" name="keyword" class="form-control"
                                            value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
                                            placeholder="Tìm kiếm sản phẩm..." required>
                                        <button type="submit" class="btn btn-primary ms-2">Tìm</button>
                                    </form>
                                </div>

                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <label for="">
                                                <?php 
                                                    if (isset($_SESSION['user_clinet'])) {
                                                    echo $_SESSION['user_clinet'];
                                                } ?>
                                            </label>
                                            <a href="#">
                                                    <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <?php if (!isset($_SESSION['user_clinet'])) { ?>
                                                    <li><a href="<?= BASE_URL . '/?act=login' ?>">Đăng Nhập</a></li>
                                                    <li><a href="<?= BASE_URL . '/?act=register' ?>">Đăng Ký</a></li>
                                                <?php } else { ?>
                                                    <li><a href="<?= BASE_URL . '/?act=chi-tiet-khach-hang' ?>">Tài Khoản</a>
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
                                            <?php if (!isset($_SESSION['user_clinet'])) { ?>
                                                    <a href="<?= BASE_URL . '?act=gio-hang' ?>">
                                                        <i class="pe-7s-shopbag"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= BASE_URL ?>?act=gio-hang" class="minicart-btn" style="position: relative; display: inline-block; padding-right: 20px;">
                                                        <i class="pe-7s-shopbag"></i>
                                                        <span style="position: absolute; top: 0; right: 0; font-size: 12px; padding: 2px 5px; background-color: #f0f0f0; border-radius: 3px; white-space: nowrap;">
                                                            (<?= isset($tongDonHang) ? $tongDonHang : 0 ?>)
                                                        </span>
                                                    </a>
                                                <?php } ?>
                                        </li>
                                    </ul>
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