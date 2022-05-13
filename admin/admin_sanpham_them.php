<?php include"./admin_header.php";?>
	<link rel="stylesheet" href="./CSS/admin_sanpham_them.css">
	<!-- end sidebar -->
	<?php 
			if(isset($_POST["themsanpham"]))
{
       move_uploaded_file($_FILES["anhgoc"]["tmp_name"], "../sanpham/".$_FILES["anhgoc"]["name"]);
       move_uploaded_file($_FILES["anh1"]["tmp_name"], "../sanpham/".$_FILES["anh1"]["name"]);
       move_uploaded_file($_FILES["anh2"]["tmp_name"], "../sanpham/".$_FILES["anh2"]["name"]);
       move_uploaded_file($_FILES["anh3"]["tmp_name"], "../sanpham/".$_FILES["anh3"]["name"]);
       move_uploaded_file($_FILES["anh4"]["tmp_name"], "../sanpham/".$_FILES["anh4"]["name"]);
       if($_POST["tensanpham"]!="" && $_POST["giamoi"]!="" && $_POST["giacu"]!="" && $_POST["soluong"]!="" && $_POST["ID_hang"]!="" && $_POST["theloai"]!="" && $_POST["mota"]!="")
	   {
       $tensanpham=$_POST["tensanpham"];
       $giamoi=$_POST["giamoi"];
       $giacu=$_POST ["giacu"];
       $soluong=$_POST["soluong"];
       $anhgoc=$_FILES["anhgoc"]["name"];
       $anh1=$_FILES["anh1"]["name"];
       $anh2=$_FILES["anh2"]["name"];
       $anh3=$_FILES["anh3"]["name"];
       $anh4=$_FILES["anh4"]["name"];
       $ID_hang=$_POST["ID_hang"];
       $duongkinh=$_POST["duongkinh"];
       $chongnuoc=$_POST["chongnuoc"];
       $chatlieu=$_POST["chatlieu"];
       $nangluong=$_POST["nangluong"];
       $size=$_POST["size"];
       $chatlieuday=$_POST["chatlieuday"];
       $chatlieuvo=$_POST["chatlieuvo"];
       $kieudang=$_POST["kieudang"];
       $xuatxu=$_POST["xuatxu"];
       $baohanh=$_POST["baohanh"];
       $theloai=$_POST["theloai"];
       $mota=$_POST["mota"];
	   $sql="INSERT INTO `sanpham`(`tensanpham`, `giamoi`, `giacu`, `soluong`, `anhgoc`, `anh1`, `anh2`, `anh3`, `anh4`, `ID_hang`, `theloai`, `mota`, `duongkinh`, `chongnuoc`, `chatlieu`, `nangluong`, `size`, `chatlieuday`, `chatlieuvo`, `kieudang`, `xuatxu`, `baohanh`) VALUES ('$tensanpham','$giamoi','$giacu','$soluong','$anhgoc','$anh1','$anh2','$anh3','$anh4','$ID_hang','$theloai','$mota','$duongkinh','$chongnuoc','$chatlieu','$nangluong','$size','$chatlieuday','$chatlieuvo','$kieudang','$xuatxu','$baohanh')";
       $query=mysqli_query($conn, $sql);
	   echo "<script type='text/javascript'>  window.location='admin_sanpham.php'; </script>";
	   }
	   else{
		   echo "Nhập thông tin đầy đủ";
	   }
	}
			?>
	<!-- main content -->
    <div class="wrapper">
        <div class="mainRight">
            <h2 class="mainRight_tittle">Thêm sản phẩm</h2>
            <form action="" method="POST" class="mainRight_form" enctype="multipart/form-data">
                <div class="mainRight_form_item">
                    <p>tên sản phẩm</p>
                    <input type="text" name="tensanpham">
                </div>
                <div class="mainRight_form_item">
                    <p>Giá mới</p>
                    <input type="text" name="giamoi">
                </div>
                <div class="mainRight_form_item">
                    <p>Giá cũ</p>
                    <input type="text" name="giacu">
                </div>
                <div class="mainRight_form_item">
                    <p>số lượng</p>
                    <input type="text" name="soluong">
                </div>
                <div class="mainRight_form_item">
                    <p>ảnh gốc</p>
                    <input type="file" name="anhgoc">
                </div>
                <div class="mainRight_form_item">
                    <p>ảnh 1</p>
                    <input type="file" name="anh1">
                </div>
                <div class="mainRight_form_item">
                    <p>ảnh 2 </p>
                    <input type="file" name="anh2">
                </div>
                <div class="mainRight_form_item">
                    <p>ảnh 3</p>
                    <input type="file" name="anh3">
                </div>

                <div class="mainRight_form_item">
                    <p>ảnh 4</p>
                    <input type="file" name="anh4">
                </div>
                <div class="mainRight_form_item">
                    <p>Hãng</p>
                    <select name="ID_hang" id="" class="mainRight_form_select">
                        <?php 
                        $sql_hang="select * from hang";
                        $query_hang=mysqli_query($conn, $sql_hang);
                        while($row_hang=mysqli_fetch_assoc($query_hang))
                        {
                        ?>
						<option value="<?php echo $row_hang['ID_hang']?>"><?php echo $row_hang['tenhang']?></option>
                        <?php }?>
					</select>
                </div>
                <div class="mainRight_form_item">
                    <p>thể loại</p>
                    <select name="theloai" id="" class="mainRight_form_select">
                    
						<option value="dong ho co">đồng hồ cơ</option>
						<option value="dong ho thong minh">Đồng hồ thông minh</option>
					</select>
                </div>

                <div class="mainRight_form_item">
                    <p>Đường kính</p>
                    <input type="text" name="duongkinh">
                </div>


                <div class="mainRight_form_item">
                    <p>Chống nước</p>
                    <input type="text" name="chongnuoc">
                </div>

                <div class="mainRight_form_item">
                    <p>Chất liệu</p>
                    <input type="text" name="chatlieu">
                </div>


                <div class="mainRight_form_item">
                    <p>Năng lượng</p>
                    <input type="text" name="nangluong">
                </div>


                <div class="mainRight_form_item">
                    <p>size</p>
                    <input type="text" name="size">
                </div>
                <div class="mainRight_form_item">
                    <p>Chất liệu dây</p>
                    <input type="text" name="chatlieuday">
                </div>

                <div class="mainRight_form_item">
                    <p>Chất liệu vỏ</p>
                    <input type="text" name="chatlieuvo">
                </div>

                <div class="mainRight_form_item">
                    <p>Kiểu dáng</p>
                    <input type="text" name="kieudang">
                </div>

                <div class="mainRight_form_item">
                    <p>Xuất xứ</p>
                    <input type="text" name="xuatxu">
                </div>

                <div class="mainRight_form_item">
                    <p>Bảo hành</p>
                    <input type="text" name="baohanh">
                </div>

                <div class="mainRight_form_item mainRight_form_item-center">
                    <p>mô tả</p>
                    <div class="mainRight_form_item_frame"><textarea class="mainRight_form_item-textarea" name="mota" id="" cols="1000" rows="10"></textarea></div>
                </div>

                <input class="mainRight_form_btn" type="submit" value="Thêm sản phẩm" name="themsanpham" onclick="Redirect();">
            </form>
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( 'mota' );
    </script>
    <?php include"./admin_footer.php"?>