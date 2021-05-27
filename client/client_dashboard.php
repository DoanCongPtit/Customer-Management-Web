<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/adminDashboard.css">
    <title>Client</title>
</head>

<body>
    <?php session_start(); ?>
    <?php include "../connection.php";
    $id = $_SESSION["log_state"]["id"];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);
    mysqli_close($conn);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <?php include "./sidebar.php" ?>
        <div class="content">

            <form action="" method="post">
                <div id="card">
                    <h2>THÔNG TIN CÁ NHÂN</h2>
                    <hr />
                    <div class="avatar">
                        <img height="200px" width="200px" src="../<?= $row["image_path"] ?>" alt="Avatar" />
                        <br>
                    </div>
                    <hr />
                    <div class="infor">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Họ tên : </label>
                                <input type="text" value="<?= $row["full_name"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Số điện thoại : </label>
                                <input type="text" value="<?= $row["phone_number"] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Địa chỉ : </label>
                                <input type="text" value="<?= $row["address"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Email : </label>
                                <input type="text" value="<?= $row["gmail"] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Ngày sinh : </label>
                                <input type="text" value="<?= $row["date_of_birth"] ?>">
                            </div>
                            
                        </div>
                        <hr>
                        <div>
                            <h3 style="font-weight: bold; color: red;">Điểm : <?= $row["point"] ?></h3>
                        </div>
                    </div>
                    <hr>
                </div>
            </form>
        </div>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
</body>

</html>