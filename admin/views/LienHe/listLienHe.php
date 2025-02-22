<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End Header -->
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
                    <h1>Quản lý liên hệ</h1>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Id tài khoản</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listLienHe as $key => $lienHe): ?>

                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $lienHe['tai_khoan_id'] ?></td>
                                        <td><?= $lienHe['ho_ten'] ?></td>
                                        <td><?= $lienHe['email'] ?></td>
                                        <td><?= $lienHe['so_dien_thoai'] ?></td>
                                        <td><?= $lienHe['chu_de_lien_he'] ?></td>
                                        <td><?= $lienHe['noi_dung'] ?></td>
                                        <td><?= $lienHe['trang_thai_lien_he'] == 1 ? 'Chưa xử lý' : 'Đã xử lý' ?></td>
                                        <td>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=form-sua-lien-he&id=' . $lienHe['id']  ?>">
                                                <button class="btn btn-primary">Sửa</button>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=xoa-lien-he&id=' . $lienHe['id'] ?> "
                                                onclick="return confirm('Bạn có chắc chắn xóa không')">
                                                <button class="btn btn-danger">Xoá</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

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