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
    <?php
    include "../connection.php";
    $msg = "";
    $id = $_SESSION["log_state"]["id"];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);

    if (isset($_GET["action"]) && $_GET["action"] == "edit") {
        include "../file_upload.php";
        $fullName = $_POST["full_name"];
        $gmail = $_POST["gmail"];
        $dateOfBirth = $_POST["date_of_birth"];
        $phoneNumber = $_POST["phone_number"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $pathOfFile = getFileUploaded();

        $sql = "UPDATE users SET full_name = '" . $fullName . "', gmail = '" . $gmail . "' 
        , date_of_birth = '" . $dateOfBirth . "', phone_number = '" . $phoneNumber . "', 
        address = '" . $address . "', password = '" . $password . "', image_path = '" . $pathOfFile . "' WHERE id = '" . $id . "'";
        if (mysqli_query($conn, $sql)) {
            $msg = '<div class="alert alert-success">Cập nhật thành công</div>';
        } else {
            $msg = '<div class="alert alert-danger">Xảy ra lỗi</div>';
        }
    }
    mysqli_close($conn);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <?php include "./sidebar.php" ?>
        <div class="content">
            <div class="col-sm-10 col-sm-offset-2">
                <?= $msg; ?>
            </div>
            <form action="./edit.php?action=edit" method="post" enctype="multipart/form-data">
                <div id="card">
                    <h2>THÔNG TIN CÁ NHÂN</h2>
                    <hr />
                    <div class="avatar">
                        <img height="200px" width="200px" id="showImg" src="../<?= $row["image_path"] ?>" alt="Avatar" />
                        <input type="file" id="img" name="img_upload" accept="image/*">
                    </div>
                    <hr />
                    <div class="infor">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Họ tên : </label>
                                <input type="text" name="full_name" value="<?= $row["full_name"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Số điện thoại : </label>
                                <input type="text" name="phone_number" value="<?= $row["phone_number"] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Địa chỉ : </label>
                                <input type="text" name="address" value="<?= $row["address"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Email : </label>
                                <input type="text" name="gmail" value="<?= $row["gmail"] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Ngày sinh : </label>
                                <input type="text" name="date_of_birth" value="<?= $row["date_of_birth"] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Password : </label>
                                <input type="password" name="password" value="<?= $row["password"] ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6" style="text-align: right;">
                                <input type="submit" value="CẬP NHẬT">
                            </div>
                            <div class="col-sm-6">
                                <button><a href="./client_dashboard.php" style="text-align: left; text-decoration: none; color: black;">HUỶ</a></button>
                            </div>
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
    <script>
        img.onchange = evt => {
            $("#showImg").show();
            const [file] = img.files
            if (file) {
                showImg.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>