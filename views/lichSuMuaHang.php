<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <h1 class="" style="margin-bottom: 30px;">Lịch sử mua hàng</h1>
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($donHangs as $donHang): 
                                    ?>
                                        <tr>
                                            <td><?= $donHang['ma_don_hang'] ?></td>
                                            <td><?= $donHang['ngay_dat'] ?></td>
                                            <td><?= formatPrice($donHang['tong_tien']) ?></td>
                                            <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                            <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id']?>" class="btn-huy">Chi tiết đơn hàng</a>
                                                <?php if($donHang['trang_thai_id'] === 1) { ?>
                                                    <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id']?>" 
                                                       class="btn-huy"
                                                       onclick="return confirm('Bạn xác nhận huỷ đơn hàng?')">
                                                        Hủy
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>   
                                    <?php 
                                        endforeach; 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .btn-huy {
        background-color: #a67c52 !important; /* Màu nâu */
        color: white !important;
        border: 2px solid white !important;
        padding: 8px 16px;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        text-decoration: none;
    }

    .btn-huy:hover {
        background-color: #8b5e34 !important; /* Màu nâu đậm khi hover */
        border-color: white;
    }
</style>

<?php 
    require_once 'layout/footer.php'; 
?>