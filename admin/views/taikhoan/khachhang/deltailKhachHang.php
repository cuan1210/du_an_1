<!-- Header -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Tài Khoản Khách Hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width: 100%" alt=""
                        onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSppkoKsaYMuIoNLDH7O8ePOacLPG1mKXtEng&s'">
                </div>
                <div class="col-8">
                    <div class="container">
                        <table class="table">
                            <tbody style="font-size: large;">
                                <tr>
                                    <th>Khách Hàng:</th>
                                    <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày Sinh:</th>
                                    <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $khachHang['email'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Số Điện Thoại:</th>
                                    <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Giới Tính:</th>
                                    <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                                </tr>
                                <tr>
                                    <th>Địa Chỉ:</th>
                                    <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng Thái:</th>
                                    <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer-->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->
</body>

</html>