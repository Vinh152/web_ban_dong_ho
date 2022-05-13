<?php
session_start();
include "./connect/connect.php";
if(isset($_POST["nhanxet"]))
{
    $id=$_SESSION["id_sanpham"];
    if(isset($_SESSION["login"]))
    {
        $hoten=$_SESSION["login"];
        $star=$_POST["sao"];
        $nhanxet=$_POST["comment"];
        if($star!="" && $nhanxet!="")
        {
            $sql="INSERT INTO `review`(`ID`, `hoten`, `star`, `nhanxet`) VALUES ('$id','$hoten','$star','$nhanxet')";
            $query=mysqli_query($conn, $sql);
            echo "<script>alert('Đánh giá sản phẩm thành công')</script>";
            echo "<script type='text/javascript'>  window.location='./product-information.php?id=$id'; </script>";
        }
        else{
            echo "<script>alert('Mời nhập đầy đủ thông tin')</script>";
            echo "<script type='text/javascript'>  window.location='./product-information.php?id=$id'; </script>";
        }
    }
    else{
            echo "<script>alert('Mời đăng nhập')</script>";
            echo "<script type='text/javascript'>  window.location='./product-information.php?id=$id'; </script>";
    }
}
?>