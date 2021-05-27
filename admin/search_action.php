<?php
include "../connection.php";
if (isset($_POST['data'])) {
    $key = trim($_POST['data']); // nhận giá trị trừ ajax gửi qua để xử lý
    $sql = "SELECT * from users Where full_name like '%" . $key . "%'";
    $result = mysqli_query($conn, $sql);
    $output = "";
    mysqli_close($conn);
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '
   <tr>
    <td>' . $row["id"] . '</td>
    <td>' . $row["full_name"] . '</td>
    <td>' . $row["gmail"] . '</td>
   </tr>
  ';
    }
    echo $output;
} else {
    $output .= '
   <tr>
    <td></td>
    <td>NOT FOUND</td>
    <td></td>
   </tr>
  ';
    echo $output;
}
