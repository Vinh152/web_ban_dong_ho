<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
    <link rel="stylesheet" href="./CSS/admin_donhang.css">
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin đơn hàng</h1>
		</div>
        <form class="mainRight_search" method="GET">
            <div class="mainRight_search_item">
            <p class="mainRight_search_text-short">Họ tên khách hàng</p>
            <input type="text" name="hoten">
            </div>
            <button class="mainRIght_search_btn" type="submit" name="search_hoten">Gửi</button>
        </form>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Thời gian đặt</th>
                    <th>Tổng</th>
                    <th>ID_nhanvien</th>
                    <th>Thông tin thanh toán</th>
                    <th>Xem chi tiết</th> 
                    <th>Thanh toán</th>
                </tr>
				<?php
        if(isset($_GET["search_hoten"]))
        {
            $hoten=$_GET["hoten"];
            if($hoten!="")
            {
                $sql="select * from giohang where hoten='$hoten' ORDER BY thoigiandat DESC";
            }
            else{
                $sql="select * from giohang ORDER BY thoigiandat DESC";
                echo '<script> alert("Mời nhập thông tin họ tên"); </script>';
            }
        }
        else{
            $sql="select * from giohang ORDER BY thoigiandat DESC";
        }
		$query=mysqli_query($conn, $sql);
		while($row=mysqli_fetch_assoc($query))
		{
        ?>
                <tr>
                   <td><?php echo $row["ID"]?></td>
                   <td><?php echo $row["hoten"]?></td>
                   <td><?php echo $row["sdt"]?></td>
                   <td><?php echo $row["diachi"]?></td>
                   <td><?php $date = new DateTime($row["thoigiandat"]); echo $date->format('d/m/Y');?></td>
                   <td><?php echo number_format($row["tong"])?>đ</td>
                   <td><?php if($row["ID_nhanvien"]==""){echo "Trống";} else {
					   $id=$row["ID_nhanvien"];
					   $sql1="select * from nhanvien where ID=$id";
					   $query1=mysqli_query($conn, $sql1);
					   $nhanvien=mysqli_fetch_assoc($query1);
					   echo $nhanvien["hoten"];
				   }?></td>
                   <?php if($row["thanhtoan"]=="Đã thanh toán")
                   {
                   ?>
                   <td class="color-green text-uppercase text-fontweight"><?php echo $row["thanhtoan"]?></td>
                   <?php } else{?>
                    <td class="color-red text-uppercase text-fontweight"><?php echo $row["thanhtoan"]?></td>
                    <?php }?>
                   <td><a href="./admin_chitietdonhang.php?ID=<?php echo $row["ID"]?>">Xem chi tiết</a></td>
                   <td><a href="./admin_btn_thanhtoan.php?ID_donhang=<?php echo $row["ID"];?>">Thanh toán</a></td>
                </tr>
			<?php }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php"?>