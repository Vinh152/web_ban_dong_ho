<?php include "./admin_header.php";?>
	<!-- end sidebar -->
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
    <div class="wrapper">
    <form action="" class="mainRight_search" method="POST">
            <div class="mainRight_search_frame">
                <div class="mainRight_search_item">
                    <p>Tháng</p> <input type="text" name="thang" <?php if(isset($_POST["submit_nhanvien"])){?>  value="<?php echo $_POST["thang"]; }?>">
                </div>
                <div class="mainRight_search_item">
                    <p>Năm</p> <input type="text" name="nam" <?php if(isset($_POST["submit_nhanvien"])){?>  value="<?php echo $_POST["nam"]; }?>">
                </div>
                <div class="mainRight_search_item">
                    <p>Họ tên nhân viên(Nếu có)</p> <input type="text" name="hoten" <?php if(isset($_POST["submit_nhanvien"])){?>  value="<?php echo $_POST["hoten"]; }?>">
                </div>
            </div>
            <input type="submit" name="submit_nhanvien" value="Gửi" class="mainRight_search_submit">
        </form>
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin nhân viên</h1>
		</div>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Ảnh nhân viên</th>
                    <th>Tổng doanh thu</th>
                </tr>
			<?php
            $date = getdate();
            $thang=$date['mon'];
            $nam=$date["year"];
            if(isset($_POST["submit_nhanvien"]))
            {
                $thang=$_POST["thang"];
                $nam=$_POST["nam"];
                $hoten=$_POST["hoten"];
                if($thang=="" && $nam=="")
                {
                    $thang=$date['mon'];
                    $nam=$date["year"];
                }
                else{
                    $thang=$_POST['thang'];
                   $nam=$_POST["nam"];
                }
                if($hoten!="")
                {
                    $sql="SELECT  nhanvien.anh,ID_nhanvien,nhanvien.hoten,SUM(giohang.tong) as 'tongdoanhthu' FROM `giohang`, `nhanvien` WHERE nhanvien.ID=giohang.ID_nhanvien and MONTH(giohang.thoigiandat)=$thang and YEAR(giohang.thoigiandat)=$nam GROUP BY ID_nhanvien HAVING hoten='$hoten'";
                }
                else{
                    $sql="SELECT  nhanvien.anh,ID_nhanvien,nhanvien.hoten,SUM(giohang.tong) as 'tongdoanhthu' FROM `giohang`, `nhanvien` WHERE nhanvien.ID=giohang.ID_nhanvien and MONTH(giohang.thoigiandat)=$thang and YEAR(giohang.thoigiandat)=$nam GROUP BY ID_nhanvien";
                }
            }
            else{
                $sql="SELECT  nhanvien.anh,ID_nhanvien,nhanvien.hoten,SUM(giohang.tong) as 'tongdoanhthu' FROM `giohang`, `nhanvien` WHERE nhanvien.ID=giohang.ID_nhanvien and MONTH(giohang.thoigiandat)=$thang and YEAR(giohang.thoigiandat)=$nam GROUP BY ID_nhanvien";
            }
			$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
			?>
                <tr>
                    <td><?php echo $row["ID_nhanvien"]?></td>
                    <td class="color-red"><?php echo $row["hoten"]?></td>
                    <td><img class="mainRight_table_anh-50" src="./avatar/<?php echo $row['anh']?>" alt=""></td>
                    <td class="color-red"><?php echo number_format($row["tongdoanhthu"])?>đ</td>
                </tr>
			<?php }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php";?>