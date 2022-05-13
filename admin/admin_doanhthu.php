<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_doanhthu.css">
    <div class="wrapper">
        <form action="" class="mainRight_search" method="POST">
            <div class="mainRight_search_frame">
                <div class="mainRight_search_item">
                    <p>Tháng</p> <input type="text" name="thang" <?php if(isset($_POST["submit_doanhthu"])){?>  value="<?php echo $_POST["thang"]; }?>">
                </div>
                <div class="mainRight_search_item">
                    <p>Năm</p> <input type="text" name="nam" <?php if(isset($_POST["submit_doanhthu"])){?>  value="<?php echo $_POST["nam"]; }?>">
                </div>
            </div>
            <input type="submit" name="submit_doanhthu" class="mainRight_search_submit">
        </form>


        <div class="mainRigth_main">
            <h3>Thông tin doanh thu</h3>
			<p class="mainRight_tongdoanhthu"><a href="./admin_bang_doanhthu.php">Thông tin doanh thu đã lưu</a></p>
            <div class="mainRigth_main_table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên khách hàng</th>
                        <th>Thời gian đặt</th>
                        <th>Tổng</th>
                    </tr>
				<?php
				if(isset($_POST["submit_doanhthu"]))
				{
					$tongdoangthu=0;
					$thang=$_POST["thang"];
					$nam=$_POST["nam"];
					$sql="SELECT * FROM `giohang` WHERE MONTH(thoigiandat)=$thang and YEAR(thoigiandat)=$nam";
					$query=mysqli_query($conn, $sql);
					$query1=mysqli_query($conn, $sql);
					$row=mysqli_fetch_assoc($query);
					if($row)
					{
					while($row2=mysqli_fetch_assoc($query1)){
					if($row2["thanhtoan"]!="Chưa thanh toán")
				{   $tongdoangthu=$tongdoangthu+$row2["tong"];
				?>
                    <tr>
                        <td><?php echo $row2["ID"]?></td>
                        <td><?php echo $row2["hoten"]?></td>
                        <td><?php echo $row2["thoigiandat"]?></td>
                        <td><?php echo number_format($row2["tong"])?>đ</td>
                    </tr>
				<?php }}} else { ?>
					<p>Không có thông tin doanh thu tháng này</p>
				<?php }
				if($tongdoangthu!=0)
				{
					$_SESSION["doanhthu"]=$tongdoangthu;
					$_SESSION["thang"]=$thang;
					$_SESSION["nam"]=$nam;
				}
				
			} else {echo "Mời bạn nhập tháng năm doanh thu";}?>
                </table>
            </div>
			<?php if(isset($_SESSION["doanhthu"])){?><p class="mainRight_tongdoanhthu"><a href="./admin_luudoanhthu.php">Lưu thông tin doanh thu</a></p>  <?php }else{?> <p class="mainRight_tongdoanhthu">Không đáp ứng lưu doang thu</p> <?php }?>
			<p class="mainRight_tongdoanhthu">Tổng doanh thu: <span><?php if(isset($_SESSION["doanhthu"])){echo number_format($_SESSION["doanhthu"]);} else {echo 0;}?></span>đ</p>
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php"?>