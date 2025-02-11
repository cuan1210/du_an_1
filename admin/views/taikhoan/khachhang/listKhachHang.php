<?php require './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Tài Khoản Khách Hàng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Ảnh Đại Diện</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhachHang as $key => $khachHang): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $khachHang['ho_ten'] ?></td>
                                        <td>
                                            <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width: 100px"
                                                alt=""
                                                onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSppkoKsaYMuIoNLDH7O8ePOacLPG1mKXtEng&s'">
                                        </td>
                                        <td><?= $khachHang['email'] ?></td>
                                        <td><?= $khachHang['so_dien_thoai'] ?></td>
                                        <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '/?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                </a>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '/?act=from-edit-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                    <button class="btn btn-warning"><i
                                                            class="fas fa-tools"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '/?act=reset-password&id_khach_hang=' . $khachHang['id'] ?>"
                                                    onclick="return confirm('Bạn Có Muốn Cài Lại Mật Khẩu Tài Khoản Này Không ?')">
                                                    <button class="btn btn-danger"><i
                                                            class="far fa-circle"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include './views/layout/footer.php';
?>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
</body>

</html>