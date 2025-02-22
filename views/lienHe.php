<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<main>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=lien-he' ?>">Liên hệ</a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-wrapper section-padding bg-light">
        <div class="container card shadow-lg p-5 rounded">
            <h1 class="text-center mb-5 text-primary fw-bold">Liên Hệ Với PhoneStore</h1>
            <div class="row g-5">
                <div class="col-md-6">
                    <h5 class="mb-3 text-secondary">Thông tin liên hệ</h5>
                    <ul class="list-unstyled fs-5">
                        <li class="mb-2">Số 1 - Trịnh Văn Bô</li>
                        <li class="mb-2">0354549424</li>
                        <li class="mb-2">nhom3du1@gmail.com</li>
                        <li class="mb-2"><a href="<?= BASE_URL ?>" target="_blank" class="text-decoration-none text-primary">phonestore.com</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3 text-secondary">Gửi tin nhắn cho chúng tôi</h5>
                    <form method="POST" action="<?= BASE_URL . '?act=them-lien-he' ?>" class="bg-white p-4 rounded shadow-sm">
                        <?php if (isset($_SESSION['success_message'])): ?>
                        <div class="alert alert-success text-center"> <?= $_SESSION['success_message'] ?> </div>
                        <?php unset($_SESSION['success_message']); endif; ?>

                        <?php if (isset($_SESSION['flash'])): ?>
                        <div class="alert alert-danger"> <?= $_SESSION['flash'] ?> </div>
                        <?php unset($_SESSION['flash']); endif; ?>

                        <input type="hidden" name="id_tai_khoan" value="<?= $_SESSION['user_client']['id'] ?? '' ?>">

                        <div class="mb-3">
                            <input type="text" class="form-control shadow-sm" placeholder="Tiêu Đề" name="chu_de_lien_he" value="<?= $_POST['chu_de_lien_he'] ?? '' ?>">
                            <small class="text-danger"> <?= $_SESSION['errors']['chu_de_lien_he'] ?? '' ?> </small>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control shadow-sm" placeholder="Họ Tên" name="ho_ten" value="<?= $_POST['ho_ten'] ?? '' ?>">
                            <small class="text-danger"> <?= $_SESSION['errors']['ho_ten'] ?? '' ?> </small>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control shadow-sm" placeholder="Email" name="email" value="<?= $_POST['email'] ?? '' ?>">
                            <small class="text-danger"> <?= $_SESSION['errors']['email'] ?? '' ?> </small>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control shadow-sm" placeholder="Số Điện Thoại" name="so_dien_thoai" value="<?= $_POST['so_dien_thoai'] ?? '' ?>">
                            <small class="text-danger"> <?= $_SESSION['errors']['so_dien_thoai'] ?? '' ?> </small>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control shadow-sm" placeholder="Nội Dung" style="height: 120px" name="noi_dung"> <?= $_POST['noi_dung'] ?? '' ?> </textarea>
                            <small class="text-danger"> <?= $_SESSION['errors']['noi_dung'] ?? '' ?> </small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3">Gửi liên hệ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'layout/footer.php'; ?>
