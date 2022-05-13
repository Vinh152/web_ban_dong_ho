<?php
session_start();
if(isset($_SESSION["login"]))
{
    unset($_SESSION["login"]);
    echo "<script type='text/javascript'>  window.location='./index.php'; </script>";
}
?>