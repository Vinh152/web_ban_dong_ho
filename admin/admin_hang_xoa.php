<?php
include "./connect/connect.php";
if(isset($_GET["id"]))
			{
				$id=$_GET["id"];
				$sql="DELETE FROM `hang` WHERE ID_hang=$id";
				$sql1="DELETE FROM `sanpham` WHERE ID_hang=$id";
				$query1=mysqli_query($conn, $sql1);
				$query=mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>  window.location='admin_hang.php'; </script>";
			}
    else{
        echo "lỗi lấy ID hãng";
    }
?>