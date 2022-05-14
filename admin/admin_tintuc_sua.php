<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham_them.css">
	<?php
	if(isset($_GET["id"]))
	{
		$id=$_GET["id"];
		$sql="select * from tintuc where ID_tintuc=$id";
		$query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_assoc($query);
		echo $id;
	}
	?>
    <div class="wrapper">
        <div class="mainRight">
            <h2 class="mainRight_tittle">Sửa tin tức</h2>
            <form action="" method="POST" class="mainRight_form" enctype="multipart/form-data">
			<div class="mainRight_form_item">
                    <p>Tiêu đề</p>
                    <input type="text" name="tieude" value="<?php echo $row['tieude'];?>">
                </div>
                <div class="mainRight_form_item">
                    <p>Ảnh tin tức</p>
                    <input type="file" name="anh">
                </div>
                <div class="mainRight_form_item">
                    <p>Lời nói ngắn</p>
                    <input type="text" name="loinoingan" value="<?php echo $row['loinoingan'];?>">
                </div>
                <div class="mainRight_form_item mainRight_form_item-center">
                    <p>mô tả</p>
                    <div class="mainRight_form_item_frame"><textarea class="mainRight_form_item-textarea" name="mota" id="" cols="1000" rows="10"><?php echo $row['mota'];?></textarea></div>
                </div>
                <input class="mainRight_form_btn" type="submit" value="Sửa tin tức" name="suatintuc" onclick="Redirect();">



                <?php 
		if(isset($_POST["suatintuc"]))
{
	move_uploaded_file($_FILES["anh"]["tmp_name"], "../News/".$_FILES["anh"]["name"]);
	if($_POST["tieude"]!="" && $_POST["loinoingan"]!="" && $_POST["mota"]!="")
	{
	echo $ID=rand(100,999);
	$tieude=$_POST["tieude"];
	$loinoingan=$_POST["loinoingan"];
	$mota=$_POST ["mota"];
	$anh=$_FILES["anh"]["name"];
	$sql1="UPDATE `tintuc` SET `tieude`='$tieude',`anh`='$anh',`loinoingan`='$loinoingan',`thoigian`=now(),`mota`='$mota' WHERE ID_tintuc=$id";
	$query1=mysqli_query($conn, $sql1);
	echo "<script type='text/javascript'>  window.location='admin_tintuc.php'; </script>";
	}
	else{
		echo "Nhập thông tin đầy đủ";
	}
	}
			?>

            </form>
        </div>
    </div>
	<!-- end main content -->
	<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( 'mota' );
    </script>
	<?php include"./admin_footer.php";?>