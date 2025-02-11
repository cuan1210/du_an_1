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
                        <div class="col-lg-6 position-static">
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
                        <div class="col-lg-4">
                            <div
                                class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i
                                            class="pe-7s-search"></i></button>
                                            <form action="" method="GET" class="d-flex">
    <input type="text" name="keyword" class="form-control" 
        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" 
        placeholder="Tìm kiếm sản phẩm..." required>
    <button type="submit" class="btn btn-primary ms-2">Search</button>
</form>




                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                                <li><a href="login-register.html">Đăng nhập</a></li>
                                                <li><a href="login-register.html">Đăng ký</a></li>
                                                <li><a href="my-account.html">Tài khoản</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification">2</div>
                                            </a>
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
    <!-- end Header Area -->