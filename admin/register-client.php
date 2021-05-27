<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/register-client.css">
</head>

<body>
    <?php
    session_start();
    $msg = " ";
    if (isset($_SESSION["log_state"])) {
        include "../file_upload.php";
        include "../connection.php";
        if (isset($_GET["action"]) && $_GET["action"] == "register" && isset($_FILES["img_upload"])) {
            $fullName = $_POST["full_name"];
            $gmail = $_POST["gmail"];
            $dateOfBirth = $_POST["date_of_birth"];
            $phoneNumber = $_POST["phone_number"];
            $address = $_POST["address"];
            $password = $_POST["password"];
            $createdDate = date("Y-m-d");
            $pathOfFile = getFileUploaded();
            $sql = "INSERT INTO users(full_name, gmail, password,
             created_at,  date_of_birth,
              phone_number, address, image_path) VALUES ('$fullName','$gmail','$password','$createdDate','$dateOfBirth','$phoneNumber','$address','$pathOfFile')";

            if (mysqli_query($conn, $sql)) {
                $msg = '<div class="alert alert-success">Thêm thành công</div>';
            } else {
                $msg = '<div class="alert alert-danger">Xảy ra lỗi</div>';
            }
            mysqli_close($conn);
        } ?>
        <?php include "./sidebar.php" ?>
        <div class="signup-form">
            <div class="col-sm-10 col-sm-offset-2">
                <?= $msg; ?>
            </div>
            <form action="./register-client.php?action=register" method="post" enctype="multipart/form-data">
                <h2>TRANG ĐĂNG KÝ</h2>
                <p class="hint-text">NHẬP THÔNG TIN KHÁCH HÀNG</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="full_name" placeholder="Họ và tên" required="required"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="gmail" placeholder="Gmail" required="required">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="date_of_birth" placeholder="Ngày sinh" required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_number" placeholder="Số điện thoại liên hệ" required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ" required="required">
                </div>
                <div class="form-group">
                    <input type="file" id="img" name="img_upload" accept="image/*">
                    <img height="150px" width="120px" id="showImg" src="#" alt="your image" style="display: none;" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="required">
                    <span id="message"></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Thêm khách hàng</button>
                </div>
            </form>
        </div>

    <?php } else {
        echo "Vui lòng đăng nhập";
    } ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $('#password, #confirm_password').on('keyup', function() {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Khớp').css('color', 'green');
            } else
                $('#message').html('Không khớp').css('color', 'red');
        });

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