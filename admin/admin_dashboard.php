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
    include "./delete.php";
    include "./birthday_action.php";

    $currentPage = !empty($_GET["page"]) ? $_GET["page"] : 1;
    $itemPerPage = !empty($_GET["itemPerPage"]) ? $_GET["itemPerPage"] : 5;
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
      <div style="padding-top: 50px;"><button type="button" class="btn btn-primary" >
          Khách hàng <span class="badge badge-light"><?= $totalUsers ?></span>
        </button></div>

      <form action="" method="post">
        <input type='submit' value='Delete' name='but_delete'><br><br>
        <table class="table sortable" style="width: 900px;">
          <tr>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(1)')">STT <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(2)')">HỌ TÊN <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(3)')">GMAIL <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col" onclick="w3.sortHTML('.table','.item', 'td:nth-child(4)')">ĐIỂM <i class="fa fa-sort" aria-hidden="true"></i></th>
            <th scope="col">Tích</th>
            <th scope="col">GHI CHÚ</th>
          </tr>
          <tbody>
            <?php
            $date = date("Y-m-d");
            $birthday = "";
            while ($row = mysqli_fetch_assoc($result)) {
              //echo $row["date_of_birth"] . "===" . $date . "===" . $row["full_name"] . "</br>";
              $dateOfBirth = $row["date_of_birth"];
              $date = $date;
              $cmp = strcmp($dateOfBirth, $date);
              //echo $cmp . "</br>";
              if ($cmp == 0) {
                $birthday = "Sinh nhật khách hàng";
              } else {
                $birthday = "";
              }
            ?>
              <tr class="item">
                <td><?= $row["id"] ?></td>
                <td><?= $row["full_name"] ?></td>
                <td><?= $row["gmail"] ?></td>
                <td><?= $row["point"] ?></td>
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
      <hr>
      <?php include "./customer_hall.php" ?>
      <hr>
      <h3 style="text-align: center; margin-top: 100px;">BIỂU ĐỒ</h3>
      <table class="columns" style="margin-left: 200px; margin-top: 50px;">
        <tr>
          <td>
            <div id="piechart_div" style="border: 1px solid #ccc"></div>
          </td>
        </tr>
      </table>
    </div>

  <?php } else {
    echo "Vui lòng đăng nhập";
  }
  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $.ajax({
        url: "chart.php",
        dataType: "JSON",
        success: function(result) {
          google.charts.load('current', {
            'packages': ['corechart']
          });
          google.charts.setOnLoadCallback(function() {
            drawChart(result);
          });
        }
      });

      function drawChart(result) {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'full_name');
        data.addColumn('number', 'point');
        var dataArray = [];
        $.each(result, function(i, obj) {
          dataArray.push([obj.full_name, parseInt(obj.point)]);
        });

        data.addRows(dataArray);

        var piechart_options = {
          title: 'ĐIỂM PHÂN PHỐI',
          width: 600,
          height: 500
        };
        var piechart = new google.visualization.PieChart(document
          .getElementById('piechart_div'));
        piechart.draw(data, piechart_options);

      }

    });
  </script>
</body>

</html>