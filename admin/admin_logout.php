<?php
session_start();
if(isset($_SESSION["login_nhanvien"]))
{
    unset($_SESSION["login_nhanvien"]);
    echo "<script type='text/javascript'>  window.location='index.php'; </script>";
}
?>