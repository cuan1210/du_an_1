<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

  <style>
    /* Container chính */
    .container {
      display: flex;
      gap: 20px;
      padding: 20px;
    }

    /* Bộ lọc bên trái */
    .sidebar {
      width: 20%;
      background: #f8f8f8;
      padding: 15px;
      border-radius: 5px;
    }

    .sidebar h2 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 8px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #333;
    }

    /* Danh sách sản phẩm */
    .product-list {
      width: 80%;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    /* Sản phẩm */
    .product-item {
      border: 1px solid #ddd;
      padding: 15px;
      text-align: center;
      background: #fff;
      border-radius: 5px;
    }

    .product-item img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }

    .product-item h3 {
      font-size: 16px;
      margin: 10px 0;
    }

    .price {
      font-size: 14px;
      color: red;
    }

    .old-price {
      text-decoration: line-through;
      color: gray;
      margin-right: 10px;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
      }

      .product-list {
        width: 100%;
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 480px) {
      .product-list {
        grid-template-columns: repeat(1, 1fr);
      }
    }
  </style>


  <div class="container">
    <!-- Bộ lọc danh mục -->
    <aside class="sidebar">
      <h3>Bộ Lọc</h3>
      <h2>Danh mục</h2>
      <ul>
        <li><a href="?act=list-san-pham">Tất cả</a></li>
        <?php foreach ($listDanhMuc as $danhMuc): ?>
          <li>
            <a href="?act=list-san-pham&danh_muc_id=<?= $danhMuc['id'] ?>">
              <?= $danhMuc['ten_danh_muc'] ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

    </aside>

    <!-- Danh sách sản phẩm -->
    <main class="product-list">
      <?php if (empty($listSanPham)): ?>
        <p>Không có sản phẩm nào!</p>
      <?php else: ?>
        <?php foreach ($listSanPham as $sanPham): ?>
          <div class="product-item">
            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?> ">
              <img src="<?= $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>">
            </a>
            <h3><?= $sanPham['ten_san_pham'] ?></h3>
            <p class="price">
              <span class="old-price"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>đ</span>
              <span class="new-price"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
            </p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </main>
  </div>


<?php require_once 'layout/footer.php'; ?>