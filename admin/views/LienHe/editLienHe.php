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
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật trạng thái liên hệ</h3>
                        </div>
                        
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-lien-he'?>" method="POST">
                            <input type="hidden" name="lien_he_id" value="<?= $lienHe['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái liên hệ</label>
                                    <select name="trang_thai_lien_he" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Chọn trạng thái liên hệ</option>
                                        <option <?= $lienHe['trang_thai_lien_he'] == 1 ? 'selected' : '' ?> value="1">Chưa xử lý</option>
                                        <option <?= $lienHe['trang_thai_lien_he'] == 2 ? 'selected' : '' ?> value="2">Đã xử lý</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" fdprocessedid="6mz4gp">Sửa liên hệ</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin người liên hệ: <?= $lienHe['ho_ten'] ?></h3>
                        </div>
                            <input type="hidden" name="id" value="<?= $tinTuc['id'] ?>">
                            <div class="card-body">
                                <p><strong>Họ và tên:</strong> <?= $lienHe['ho_ten'] ?></p>
                                <hr>
                                <p><strong>Email:</strong> <?= $lienHe['email'] ?></p>
                                <hr>
                                <p><strong>Số điện thoại:</strong> <?= $lienHe['so_dien_thoai'] ?></p>
                                <hr>
                                <p><strong>Chủ đề:</strong> <?= $lienHe['chu_de_lien_he'] ?></p>
                                <hr>
                                <p><strong>Nội dung:</strong> <?= $lienHe['noi_dung'] ?></p>
                                <hr>
                            </div>
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