<?php
session_start();
include "./connect/connect.php";
if($_SESSION["login_nhanvien"])
{
    $hoten=$_SESSION["login_nhanvien"];
    $sql="select * from nhanvien where hoten = '$hoten'";
    $query=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($query);
    $ID_nhanvien=$row["ID"];
    if(isset($_GET["ID_donhang"]))
    {
        $ID_donhang=$_GET["ID_donhang"];
        $sql1="UPDATE `giohang` SET `ID_nhanvien`='$ID_nhanvien',`thanhtoan`='Đã thanh toán' WHERE ID=$ID_donhang";
        $query=mysqli_query($conn, $sql1);
        echo "<script type='text/javascript'>  window.location='admin_donhang.php'; </script>";
    }
    else{
        echo "Lỗi thanh toán hóa đơn";
    }
}
?>