<?php session_start();
    unset($_SESSION["log_state"]);
    header("Location: ./index.php");
?>