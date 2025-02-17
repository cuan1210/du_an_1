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
                            <h3 class="card-title">Sửa banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-banner&id_banner=' . $banner['id'] ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $banner['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Banner</label>
                                    <input type="text" class="form-control" name="ten_banner"
                                        placeholder="Nhập tên banner"
                                        value="<?= $banner['ten_banner'] ?>">
                                    <?php if (!empty($error['ten_banner'])) { ?>
                                        <p class="text-danger"><?= $error['ten_banner'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh">
                                    <p><strong>Hình ảnh hiện tại:</strong></p>
                                    <img src="<?= BASE_URL . $banner['hinh_anh'] ?>" alt="Hình ảnh Banner" width="150">
                                    <?php if (isset($error['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $error['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Mô Tả Banner</label>
                                    <textarea name="mo_ta" class="form-control"
                                        placeholder="Nhập mô tả banner"><?= $banner['mo_ta'] ?></textarea>
                                    <?php if (isset($error['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $error['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" fdprocessedid="6mz4gp">Sửa banner</button>
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