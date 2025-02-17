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
                    <h1>Quản lý banner</h1>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-banner' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Banner</label>
                                    <input type="text" class="form-control" name="ten_banner"
                                        placeholder="Nhập tên banner"
                                        value="<?= isset($_POST['ten_banner']) ? htmlspecialchars($_POST['ten_banner']) : '' ?>">
                                    <?php if (!empty($error['ten_banner'])) { ?>
                                        <p class="text-danger"><?= $error['ten_banner'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh" required>
                                    <?php if (!empty($error['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $error['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Mô Tả Banner</label>
                                    <textarea name="mo_ta" class="form-control"
                                        placeholder="Nhập mô tả banner"><?= isset($_POST['mo_ta']) ? htmlspecialchars($_POST['mo_ta']) : '' ?></textarea>
                                    <?php if (!empty($error['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $error['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" fdprocessedid="6mz4gp">Thêm banner</button>
                            </div>
                        </form>
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