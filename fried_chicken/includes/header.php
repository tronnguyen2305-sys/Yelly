<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cửa hàng YELLY</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    </head>
    <body>
    <?php

        $banners = [];
        $stmt = $conn->query("SELECT image_path FROM banners WHERE active = 1");
        $banners = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $userLoggedIn = isset($_SESSION['user_id']);
        $username = $userLoggedIn ? $_SESSION['username'] : "";
        /*gio hang*/
        $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart'] ):0;
        $notifyCount = 0;

        /*thong bao*/
        if($userLoggedIn) {
          $sql = "SELECT COUNT(*) AS total FROM notifications WHERE user_id = {$_SESSION['user_id']} AND seen = 0";
          $result =$conn->query($sql);
          if($result && $row = $result->fetch_assoc()) {
            $notifyCount = $row['total'];
          }
        }
     ?>

<header class="header">
  <div class="header-banner">
    <?php if (!empty($banners)): ?>
        <?php foreach ($banners as $banner): ?>
            <div class="banner-slide" 
                 style="background-image: url('images/<?php echo $banner['image_path']; ?>');">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="banner-slide" 
             style="background-image: url('assets/images/default_banner.jpg');">
        </div>
    <?php endif; ?>
</div>


  <div class="header-left">
    <img src="images/KO NEN LOGO GA.png" alt="Logo YELLY" class="logo">
    <p class="slogan">Vị ngon khó cưỡng</p>
  </div>

  <div class="search-container">
    <input type="text" id="search-input" class="search-input" placeholder="Nhập sản phẩm cần tìm....">
    <div class="search-icon"><i class="fas fa-search"></i></div>
  </div>

  <div class="header-right">
    <?php if ($userLoggedIn): ?>
      <span class="username">Xin chào, <?php echo htmlspecialchars($username); ?></span>
      <a href="logout.php" class="logout">Đăng xuất</a>
    <?php else: ?>
      <a href="login.php" class="login">Đăng nhập</a>
    <?php endif; ?>

    <div class="icon-wrapper">
      <div class="icon-box">
        <i class="fas fa-shopping-cart"></i>
      <div class="badge" id="cart-count"><?php echo $cartCount; ?></div>
    </div>

    <div class="icon-wrapper">
      <div class="icon-box">
        <i class="fas fa-bell"></i>
      <div class="badge" id="notify-count"><?php echo $notifyCount; ?></div>
    </div>
</div>
</div>
</div>
</header>

</body>

