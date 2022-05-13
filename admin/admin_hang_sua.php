<?php include"./admin_header.php";?>
	<link rel="stylesheet" href="./CSS/admin_sanpham_them.css">
	<!-- end sidebar -->
	<?php 
			if(isset($_GET["id"]))
			{
				$id=$_GET["id"];
				$sql="SELECT * FROM `hang` WHERE ID_hang='$id'";
				$query=mysqli_query($conn, $sql);
				$row=mysqli_fetch_assoc($query);
			}


			if(isset($_POST["suahang"]))
			{
	   $id=$_GET["id"];	
       if($_POST["tenhang"]!="")
	   {
       $tenhang=$_POST["tenhang"];
	   $sql="UPDATE `hang` SET `tenhang`='$tenhang' WHERE ID_hang=$id";
       $query=mysqli_query($conn, $sql);
	   }
	   echo "<script type='text/javascript'>  window.location='admin_hang.php'; </script>";
			}
			?>
	<!-- main content -->
    <div class="wrapper">
        <div class="mainRight">
            <h2 class="mainRight_tittle">Thêm sản phẩm</h2>
            <form action="" method="POST" class="mainRight_form" enctype="multipart/form-data">
                <div class="mainRight_form_item">
                    <p>tên hãng</p>
                    <input type="text" name="tenhang" value="<?php echo $row["tenhang"];?>">
                </div>
                <input class="mainRight_form_btn" type="submit" value="Sửa hãng sản phẩm" name="suahang">
            </form>
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
	<?php include"./admin_footer.php";?>