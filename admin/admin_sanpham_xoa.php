<?php
include "./connect/connect.php";
if(isset($_GET["id"]))
			{
				$id=$_GET["id"];
				$sql="DELETE FROM `sanpham` WHERE ID=$id";
				$query=mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>  window.location='admin_sanpham.php'; </script>";
			}
    else{
        echo "lỗi lấy ID sản phẩm";
    }
?>