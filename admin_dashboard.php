<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./CSS/admin_dashboard.css">
  <title>Document</title>
</head>

<body>
  <?php
  session_start();
  if(isset($_SESSION["log_state"])){
    ?>

  <?php include "./sidebar.php" ?>

  <div class="content-container">

    <div class="container-fluid">

    </div>
  </div>
<?php }
  else{
    echo "Vui lòng đăng nhập";
  }
?>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>