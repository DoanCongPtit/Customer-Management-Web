<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../CSS/sidebar.css">

<div class="sidebar-container">
  <div class="sidebar-logo">
    <?= $_SESSION["log_state"]["account"] ?>
  </div>
  <ul class="sidebar-navigation">
    <li>
      <a href="./admin_dashboard.php">
        Trang chủ
      </a>
    </li>
    <li>
      <a href="./search.php">
        Tìm kiếm
      </a>
    </li>
    <li>
      <a href="./register-client.php">
        Thêm khách hàng
      </a>
    </li>
    <li>
      <a href="../logout.php">
        Đăng xuất
      </a>
    </li>
  </ul>
</div>