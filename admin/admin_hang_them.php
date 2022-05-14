<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham_them.css">
    <div class="wrapper">
    <?php 
		if(isset($_POST["themhang"]))
{
       if($_POST["tenhang"]!="")
	   {
       $tenhang=$_POST["tenhang"];
	   $sql="INSERT INTO `hang`(`tenhang`) VALUES ('$tenhang')";
       $query=mysqli_query($conn, $sql);
	   echo "<script type='text/javascript'>  window.location='admin_hang.php'; </script>";
	   }
	   else{
		   echo "Nhập thông tin đầy đủ";
	   }
	}
			?>
        <div class="mainRight">
            <h2 class="mainRight_tittle">Thêm hãng</h2>
            <form action="" method="POST" class="mainRight_form" enctype="multipart/form-data">
                <div class="mainRight_form_item">
                    <p>Tên hãng</p>
                    <input type="text" name="tenhang">
                </div>
                <input class="mainRight_form_btn" type="submit" value="Thêm hãng" name="themhang" onclick="Redirect();">
            </form>
        </div>
    </div>
	<!-- end main content -->
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( 'mota' );
    </script>
	<?php include"./admin_footer.php";?>