<?php 
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $sql = "DELETE from users WHERE id=".$deleteid;
      mysqli_query($conn,$sql);
    }
  }
 
}
?>