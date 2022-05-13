<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham_them.css">
	<?php
	if(isset($_GET["ID"]))
	{
		$id=$_GET["ID"];
		$sql="select * from nhanvien where ID=$id";
		$query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_assoc($query);
	}
	?>
    <div class="wrapper">
        <div class="mainRight">
            <h2 class="mainRight_tittle">Sửa nhân viên</h2>
            <form action="" method="POST" class="mainRight_form" enctype="multipart/form-data">
                <div class="mainRight_form_item">
                    <p>Họ và tên</p>
                    <input type="text" name="hoten" value="<?php echo $row["ID"]?>">
                </div>
                <div class="mainRight_form_item">
                    <p>SĐT</p>
                    <input type="text" name="sdt" value="<?php echo $row["sdt"]?>">
                </div>
                <div class="mainRight_form_item">
                    <p>Địa chỉ</p>
                    <input type="text" name="diachi" value="<?php echo $row["diachi"]?>">
                </div>
                <div class="mainRight_form_item">
                    <p>Email</p>
                    <input type="text" name="email" value="<?php echo $row["email"]?>">
                </div>
                <div class="mainRight_form_item">
                    <p>ảnh gốc</p>
                    <input type="file" name="anh">
                </div>
                <div class="mainRight_form_item">
                    <p>Ngày sinh</p>
                    <input type="date" name="date" value="<?php echo $row["date"]?>">
                </div>
                <div class="mainRight_form_item">
                    <p>Giới tính</p>
                    <select name="sex" id="" class="mainRight_form_select">
						<option value="1">Nam</option>
						<option value="0">Nữ</option>
					</select>
                </div>
                <div class="mainRight_form_item">
                    <p>Chức vụ</p>
                    <select name="chucvu" id="" class="mainRight_form_select">
						<option value="nhan vien ban hang">Nhân viên bán hàng</option>
						<option value="nhan vien kinh te">Nhân viên kinh tế</option>
                        <option value="nhan vien thu ngan">Nhân viên thu ngân</option>
                        <option value="truong chi nhanh">Trưởng chi nhánh</option>
                        <option value="nhan vien ky thuat">Nhân viên kỹ thuật</option>
					</select>
                </div>
                <input class="mainRight_form_btn" type="submit" value="Sửa nhân viên" name="suanhanvien" onclick="Redirect();">



                <?php 
		if(isset($_POST["suanhanvien"]))
{
       move_uploaded_file($_FILES["anh"]["tmp_name"], "./avatar/".$_FILES["anh"]["name"]);
	   $ID=rand(100,999);
		$hoten=$_POST["hoten"];
		$sdt=$_POST["sdt"];
		$diachi=$_POST ["diachi"];
		$email=$_POST["email"];
		$anh=$_FILES["anh"]["name"];
		$date=$_POST["date"];
		$sex=$_POST["sex"];
		$chucvu=$_POST["chucvu"];
       if($anh!="")
	   {
		if($_POST["hoten"]!="" && $_POST["sdt"]!="" && $_POST["diachi"]!="" && $_POST["email"]!="" && $_POST["date"]!="" && $_POST["sex"]!="" && $_POST["chucvu"]!="")
		{
		$sql="UPDATE `nhanvien` SET `hoten`='$hoten',`sdt`='$sdt',`diachi`='$diachi',`email`='$email',`anh`='$anh',`date`='$date',`sex`='$sex',`chucvu`='$chucvu' WHERE ID=$id";
		$query=mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>  window.location='admin_nhanvien.php'; </script>";
		}
		else{
			echo "Nhập thông tin đầy đủ";
		}
	   }
	   else{
		if($_POST["hoten"]!="" && $_POST["sdt"]!="" && $_POST["diachi"]!="" && $_POST["email"]!="" && $_POST["date"]!="" && $_POST["sex"]!="" && $_POST["chucvu"]!="")
		{
			$sql="UPDATE `nhanvien` SET `hoten`='$hoten',`sdt`='$sdt',`diachi`='$diachi',`email`='$email',`date`='$date',`sex`='$sex',`chucvu`='$chucvu' WHERE ID=$id";
		$query=mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>  window.location='admin_nhanvien.php'; </script>";
		}
		else{
			echo "Nhập thông tin đầy đủ";
		}
	   }
	}
			?>

            </form>
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php";?>