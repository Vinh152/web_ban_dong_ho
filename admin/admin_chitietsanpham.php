<?php include "./admin_header.php"?>
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
	<!-- main content -->
    <div class="wrapper">
        <div class="mainRight_header">
        <?php
            if(isset($_GET["id"]))
            {
            $id=$_GET["id"];
            $sql="select * from sanpham where ID=$id";
			$query=mysqli_query($conn, $sql);
			$row=mysqli_fetch_assoc($query)
			?>
		<h1 class="mainRight_tittle">Thông tin sản phẩm <span style="color:red;"><?php echo $row['tensanpham']?></span></h1>
		<p class="mainRight_btnADD"><a href="./admin_sanpham.php">Trở về trang sản phẩm</a></p>
		</div>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>Đường kính</th>
                    <th>Chống nước</th>
                    <th>Chất liệu</th>
                    <th>Năng lượng</th>
                    <th>Size</th>
                    <th>Chất liệu dây</th>
                    <th>Chất liệu vỏ</th>
                    <th>Kiểu dáng</th>
                    <th>Xuất xứ</th>
                    <th>Bảo hành</th>                
                </tr>
                <tr>
                    <td><?php echo $row["duongkinh"]?></td>
                    <td><?php echo $row["chongnuoc"]?></td>
                    <td><?php echo $row["chatlieu"]?></td>
                    <td><?php echo $row["nangluong"]?></td>
                    <td><?php echo $row["size"]?></td>
                    <td><?php echo $row["chatlieuday"]?></td>
                    <td><?php echo $row["chatlieuvo"]?></td>
                    <td><?php echo $row["kieudang"]?></td>
                    <td><?php echo $row["xuatxu"]?></td>
                    <td><?php echo $row["baohanh"]?></td>
                </tr>
			<?php } else { echo "Lỗi lấy thông tin sản phẩm";}?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
	<?php include"./admin_footer.php"?>