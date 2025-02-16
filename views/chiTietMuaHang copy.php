<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <h1 class="" style="margin-bottom: 30px;">Chi tiết đơn hàng</h1>
            <div class="section-bg-color">
                <div class="row">
                    <!-- Thông tin sản phẩm của đơn hàng -->
                    <div class="col-lg-7">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Thông tin sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    <?php foreach($chiTietDonHang as $item) : ?>
                                        <tr>
                                            <td>
                                            <img class="img-fluid" src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Product" width="100px"/>
                                            </td>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= formatPrice($item['don_gia']) ?></td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= formatPrice($item['thanh_tien']) ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Thông tin đơn hàng -->
                    <div class="col-lg-5">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Thông tin đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <th>Mã đơn hàng:</th>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Người nhận:</th>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Email:</th>
                                        <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Số điện thoại:</th>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Địa chỉ:</th>
                                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Ngày đặt:</th>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Ghi chú:</th>
                                        <td><?= $donHang['ghi_chu'] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Tổng tiền:</th>
                                        <td><?= formatPrice($donHang['tong_tien']) ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Phương thức thanh toán: </th>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Trạng thái đơn hàng: </th>
                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require_once 'layout/footer.php'; 
?>