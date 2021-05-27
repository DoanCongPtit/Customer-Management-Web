<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../CSS/sidebar.css">

<div class="sidebar-container">
  <div class="sidebar-logo">
    <?= $_SESSION["log_state"]["full_name"] ?>
  </div>
  <ul class="sidebar-navigation">
    <li>
      <a href="./client_dashboard.php">
        Trang chủ
      </a>
    </li>
    <li>
      <a href="./edit.php">
        Cập nhật
      </a>
    </li>
    <li>
      <a href="../logout.php">
        Đăng xuất
      </a>
    </li>
  </ul>
</div>