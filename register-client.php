<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/register-client.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["log_state"])) {
        include "./file_upload.php";
        include "./connection.php";
        if (isset($_GET["action"]) && $_GET["action"] == "register" && isset($_FILES["img_upload"])) {
            $fullName = $_POST["full_name"];
            $gmail = $_POST["gmail"];
            $dateOfBirth = $_POST["date_of_birth"];
            $phoneNumber = $_POST["date_of_birth"];
            $address = $_POST["address"];
            $password = $_POST["password"];
            $createdDate = date("Y-m-d h:i:s");
            $pathOfFile = getFileUploaded();
            $sql = "INSERT INTO users(full_name, gmail, password,
             created_at, status, date_of_birth,
              phone_number, address, image_path) VALUES ('$fullName','$gmail','$password','$createdDate',
            '1','$dateOfBirth','$phoneNumber','$address','$pathOfFile')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        } else {
            include "./sidebar.php" ?>
            <div class="signup-form">
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
        <?php } ?>

    <?php } else {
        echo "Vui lòng đăng nhập";
    } ?>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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