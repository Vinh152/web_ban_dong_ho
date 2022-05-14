<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham_them.css">
    <div class="wrapper">
    <?php 
		if(isset($_POST["themtintuc"]))
{
       move_uploaded_file($_FILES["anh"]["tmp_name"], "../News/".$_FILES["anh"]["name"]);
       if($_POST["tieude"]!="" && $_POST["loinoingan"]!="" && $_POST["mota"]!="")
	   {
       $tieude=$_POST["tieude"];
       $loinoingan=$_POST["loinoingan"];
       $mota=$_POST ["mota"];
       $anh=$_FILES["anh"]["name"];
	   $sql="INSERT INTO `tintuc`(`tieude`, `anh`, `loinoingan`, `thoigian`, `mota`) VALUES ('$tieude','$anh','$loinoingan',now(),'$mota')";
       $query=mysqli_query($conn, $sql);
	   echo "<script type='text/javascript'>  window.location='admin_tintuc.php'; </script>";
	   }
	   else{
		   echo "Nhập thông tin đầy đủ";
	   }
	}
			?>
        <div class="mainRight">
            <h2 class="mainRight_tittle">Thêm nhân viên</h2>
            <form action="" method="POST" class="mainRight_form" enctype="multipart/form-data">
                <div class="mainRight_form_item">
                    <p>Tiêu đề</p>
                    <input type="text" name="tieude">
                </div>
                <div class="mainRight_form_item">
                    <p>Ảnh tin tức</p>
                    <input type="file" name="anh">
                </div>
                <div class="mainRight_form_item">
                    <p>Lời nói ngắn</p>
                    <input type="text" name="loinoingan">
                </div>
                <div class="mainRight_form_item mainRight_form_item-center">
                    <p>mô tả</p>
                    <div class="mainRight_form_item_frame"><textarea class="mainRight_form_item-textarea" name="mota" id="" cols="1000" rows="10"></textarea></div>
                </div>
                <input class="mainRight_form_btn" type="submit" value="Thêm tin tức" name="themtintuc" onclick="Redirect();">
            </form>
        </div>
    </div>
	<!-- end main content -->
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( 'mota' );
    </script>
	<?php include"./admin_footer.php";?>