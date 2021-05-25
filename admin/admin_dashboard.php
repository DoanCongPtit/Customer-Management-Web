<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/adminDashboard.css">
  <title>Admin</title>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION["log_state"])) {
    include "../connection.php";
    include "../delete.php";
    include "./birthday_action.php";

    $currentPage = !empty($_GET["page"]) ? $_GET["page"] : 1;
    $itemPerPage = !empty($_GET["itemPerPage"]) ? $_GET["itemPerPage"] : 7;
    $offset = ($currentPage - 1) * $itemPerPage;
    $sql = "SELECT * FROM users";
    $totalUsers = mysqli_query($conn, $sql);
    $totalUsers = $totalUsers->num_rows;
    $totalPages = ceil($totalUsers / $itemPerPage);
    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC LIMIT "
      . $itemPerPage . " OFFSET " . $offset);
    mysqli_close($conn);
  ?>

    <?php include "./sidebar.php" ?>
    <div class="content">
      <div class="total_user">
        Tổng số: <?= $totalUsers ?> Khách hàng
      </div>
      <form action="" method="post">
        <input type='submit' value='Delete' name='but_delete'><br><br>
        <table class="table sortable">
          <tr>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(1)')">STT <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(2)')">HỌ TÊN <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(3)')">GMAIL <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(4)')">NGÀY TẠO</th>
            <th scope="col">Tích</th>
            <th scope="col">GHI CHÚ</th>
          </tr>
          <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr class="item">
                <td><?= $row["id"] ?></td>
                <td><?= $row["full_name"] ?></td>
                <td><?= $row["gmail"] ?></td>
                <td><?= $row["created_at"] ?></td>
                <td><input type='checkbox' name='delete[]' value='<?= $row["id"] ?>'></td>
                <td>
                  <div data-toggle="tooltip" data-placement="top" title="Gửi mail">
                    <a href="./birthday_action.php?action=send_mail&gmail=<?= $row["gmail"] ?>"><?= $birthday ?>
                    </a>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <?php include "../pagination.php" ?>
    </div>

  <?php } else {
    echo "Vui lòng đăng nhập";
  }
  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>

</html>