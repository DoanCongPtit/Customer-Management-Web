<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./CSS/login.css">
</head>

<body>
    <?php
    session_start();
    include "./connection.php";
    if (isset($_GET["action"]) && $_GET["action"] == "login") {
        $account = $_POST["account"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM admin WHERE account = '" . $account . "' AND password = '" . $password . "'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["log_state"] = $row;
                header("Location: ./admin/admin_dashboard.php"); 
            }
        } else {
            header("Location: ./login.php");
        }
        mysqli_close($conn);
    } else {
    ?>
        <div class="login-form">
            <form action="./login.php?action=login" method="post">
                <div class="avatar">
                    <img src="./assets/avatar2.png" alt="Avatar">
                </div>
                <h2 class="text-center">Login</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="account" placeholder="account" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="login">
                </div>
                <div class="bottom-action clearfix">
                    <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                    <a href="#" class="float-right">Forgot Password?</a>
                </div>
            </form>
        </div>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>