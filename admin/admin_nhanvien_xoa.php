<?php
include "./connect/connect.php";
if(isset($_GET["ID"]))
			{
				$id=$_GET["ID"];
				$sql="DELETE FROM `nhanvien` WHERE ID=$id";
				$sql1="DELETE FROM `login_nhanvien` WHERE ID=$id";
				$query1=mysqli_query($conn, $sql1);
				$query=mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>  window.location='admin_nhanvien.php'; </script>";
			}
    else{
        echo "lỗi lấy ID nhân viên";
    }
?>