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
            <div class="mainRigth_main_table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tên doanh thu</th>
                        <th>Tháng doanh thu</th>
                        <th>Năm doanh thu</th>
						<th>Ngày tạo</th>
						<th>Tổng doanh thu</th>
						<th>Xuất ra excel</th>
                    </tr>
				<?php
				if(isset($_POST["submit_doanhthu"]))
				{
					$thang=$_POST["thang"];
					$nam=$_POST["nam"];
					if($thang!="" && $nam!="")
					{
						$sql="SELECT * FROM `thongke` WHERE thang_doanh_thu=$thang and nam_doanh_thu=$nam";
					}
					else{
						$loinhac="Không có thông tin lưu doanh thu";
						echo "<script> alert($loinhac);</script>";
						$sql="SELECT * FROM `thongke`";
					}
				}
				else {
					$sql="SELECT * FROM `thongke`";
				}
					$query1=mysqli_query($conn, $sql);
					while($row2=mysqli_fetch_assoc($query1)){
				?>
                    <tr>
                        <td><?php echo $row2["ID"]?></td>
                        <td><?php echo $row2["tendoanhthu"]?></td>
                        <td><?php echo $row2["thang_doanh_thu"]?></td>
                        <td><?php echo $row2["nam_doanh_thu"]?></td>
						<td><?php echo date('d M Y', strtotime($row2["ngaytao"]));?></td>
						<td><?php echo number_format($row2["tongdoanhthu"])?>đ</td>
						<td><a href="./admin_cobvert_excel.php?chuyendoi&thang=<?php echo $row2["thang_doanh_thu"]?>&nam=<?php echo $row2["nam_doanh_thu"]?>">Xuất</a></td>
                    </tr>
				<?php }?>
                </table>
            </div>
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php";?>