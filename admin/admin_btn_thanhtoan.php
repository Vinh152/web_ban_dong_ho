<?php
session_start();
include "./connect/connect.php";
if($_SESSION["login_nhanvien"])
{
    if(isset($_GET["ID_donhang"]))
    {
        $ID_donhang=$_GET["ID_donhang"];
        $sql1="UPDATE `giohang` SET `thanhtoan`='Đã thanh toán' WHERE ID=$ID_donhang";
        $query=mysqli_query($conn, $sql1);
        echo "<script type='text/javascript'>  window.location='admin_donhang.php'; </script>";
    }
    else{
        echo "Lỗi thanh toán hóa đơn";
    }
}
?>