<?php
include "./connect/connect.php";
session_start();
if(isset($_SESSION["doanhthu"]))
{
    $tongdoanhthu=$_SESSION["doanhthu"];
    $thang=$_SESSION["thang"];
    $nam=$_SESSION["nam"];
    $tendoanhthu="Bản thống kê doanh thu tháng $thang / $nam";
    $sql="INSERT INTO `thongke`(`tendoanhthu`, `thang_doanh_thu`, `nam_doanh_thu`, `ngaytao`, `tongdoanhthu`) VALUES ('$tendoanhthu','$thang','$nam',now(),'$tongdoanhthu')";
    $query=mysqli_query($conn, $sql);
    unset($_SESSION["doanhthu"]);
    unset($_SESSION["thang"]);
    unset($_SESSION["nam"]);
    echo "<script> alert('Lưu thông tin doanh thu thành công');</script>";
    echo "<script type='text/javascript'>  window.location='admin_doanhthu.php'; </script>";
}
?>