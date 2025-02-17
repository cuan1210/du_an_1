<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=gioi-thieu' ?>">Giới thiệu</a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="page section py-5">
        <div class="container card shadow p-5">
            <div class="text-center mb-4">
                <h1 class="display-5 fw-bold">Giới thiệu về PhoneStore</h1>
                <p class="text-muted">Cửa hàng chuyên cung cấp các sản phẩm điện thoại chính hãng.</p>
            </div>
            <div class="content-page rte">
                <p>PhoneStore là website chính thức cung cấp các sản phẩm điện thoại di động và phụ kiện chất lượng cao.
                    Chúng tôi cam kết chỉ nhận đơn hàng qua website chính thức để đảm bảo sự uy tín và chất lượng dịch
                    vụ.</p>
                <p>Các kênh liên hệ và cập nhật chính thức của PhoneStore:</p>
                <ul>
                    <li>Website: <a href="https://cellphones.com.vn" target="_blank">https://cellphones.com.vn</a></li>
                    <li>Fanpage: <a href="https://www.facebook.com/CellphoneSVietnam"
                            target="_blank">https://www.facebook.com/CellphoneSVietnam</a></li>
                    <li>Instagram: <a href="https://instagram.com/phonestore"
                            target="_blank">https://instagram.com/phonestore</a></li>
                    <li>Email: contact@phonestore.com</li>
                </ul>
                <p>PhoneStore hân hạnh được phục vụ quý khách với những sản phẩm và dịch vụ tốt nhất!</p>
            </div>
        </div>
    </div>
</main>

<?php 
    require_once 'layout/footer.php'; 
?>