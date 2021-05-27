<h3 style="text-align: center; margin-top: 100px;">KHÁCH HÀNG TIÊU BIỂU</h3>
<?php
include "../connection.php";
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY point DESC LIMIT 3");
mysqli_close($conn); ?>

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img height="250px" w src="../<?= $row["image_path"] ?>" class="card-img-top" alt="...">
                    <div class="card-body" style="background-color: ivory;">
                        <p class="card-text" style="text-align: center; font-weight: bold;"><?= $row["full_name"] ?></p>
                        <hr>
                        <p class="card-text" style="text-align: center;"><?= $row["point"] ?> Điểm</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>