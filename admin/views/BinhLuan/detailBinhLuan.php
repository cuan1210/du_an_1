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
                    <h1>Quản lý danh sách bình luận</h1>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=quan-ly-binh-luan'  ?>" class="btn btn-success">Thêm danh mục</a>
            </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tài khoản người dùng</th>
                                        <th>Nội dung</th>
                                        <th>Ngày đăng</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listBinhLuan as $key => $BinhLuan): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $BinhLuan['san_pham_id'] ?></td>
                                        <td><?= $BinhLuan['tai_khoan_id'] ?></td>
                                        <td><?= $BinhLuan['noi_dung'] ?></td>
                                        <td><?= $BinhLuan['ngay_dang'] ?></td>
                                        <td><?= $BinhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn bình luận' ?></td>
                                        <td>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $BinhLuan['id']  ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                Xóa bình luận
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