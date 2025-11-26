<?php
session_start();
require_once 'config/config.php'; 
include 'includes/header.php';?>

include 'includes/menu.php';

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cửa hàng YELLY</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
  <div class="main">

    <div class="hot-search">
        <div class="hot-box hot-title">
            <div class="hot-title-content">
                🔥Hôm nay ăn gì?
            </div>
        </div>

        <div class="category-container">
            <?php
            $stmt = $conn->prepare("SELECT * FROM categories");
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $cat):
            ?>
                <a href="<?php echo $cat['link']; ?>" class="food-item">
                    <img src="images/<?php echo $cat['image']; ?>" alt="<?php echo $cat['name']; ?>">
                    <span><?php echo $cat['name']; ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

</div>

    <div class="section-header">
      <h2 class="section-title">CÓ THỂ BẠN SẼ THÍCH</h2>
    </div>
    <div class="menu-container">
      <?php
      $stmt =$conn->prepare("SELECT * FROM combos ORDER BY id ASC");
      $stmt->execute();
      $combos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($combos as $combo):
        ?>
          <div class="menu-card">
            <img src="images/<?php echo $combo['hinhanh'];?>" alt="<?php echo $combo['ten'];?>
            <h3><?php echo $combo['ten']; ?> <br> <?php echo $combo['gia']; ?> </br> </h3>
            <p><?php echo $combo['mota']; ?></p>
            <button> Thêm vào giỏ hàng </button>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
<?php include 'includes/footer.php'; ?>