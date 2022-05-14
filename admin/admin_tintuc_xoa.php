<?php
include "./connect/connect.php";
if(isset($_GET["id"]))
			{
				$id=$_GET["id"];
				$sql="DELETE FROM `tintuc` WHERE ID_tintuc=$id";
				$query=mysqli_query($conn, $sql);
                echo "<script type='text/javascript'>  window.location='admin_tintuc.php'; </script>";
			}
    else{
        echo "lỗi lấy ID tin tức";
    }
?>