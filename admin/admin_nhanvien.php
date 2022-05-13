<?php include "./admin_header.php";?>
	<!-- end sidebar -->
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin nhân viên</h1>
		<p class="mainRight_btnADD"><a href="./admin_nhanvien_them.php">Thêm nhân viên</a></p>
		</div>
        <form class="mainRight_search" method="GET">
            <div class="mainRight_search_item">
            <p class="mainRight_search_text-short">Họ tên</p>
            <input type="text" name="hoten">
            </div>
            <button class="mainRIght_search_btn" type="submit" name="search_hoten"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Ảnh gốc</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Chức vụ</th>
                    <th>Chức năng</th>
                </tr>
			<?php
            if(isset($_GET["search_hoten"]))
            {
                $hoten=$_GET["hoten"];
                if($hoten!="")
                {
                    $sql="select * from nhanvien where hoten='$hoten'";
                }
                else{
                    $sql="select * from nhanvien";
                    echo '<script> alert("Mời nhập thông tin họ tên"); </script>';
                }
            }
            else{
                $sql="select * from nhanvien";
            }
			$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
			?>
                <tr>
                    <td><?php echo $row["ID"]?></td>
                    <td class="color-red"><?php echo $row["hoten"]?></td>
                    <td><?php echo $row["sdt"]?></td>
                    <td><?php echo $row["diachi"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><img class="mainRight_table_anh" src="./avatar/<?php echo $row['anh']?>" alt=""></td>
                    <td><?php $date = new DateTime($row["date"]); echo $date->format('d/m/Y');?></td>
                    <td><?php echo $row["sex"]?></td>
                    <?php if($row["chucvu"]=='nhan vien ban hang'){?>
                        <td>Nhân viên bán hàng</td>
                    <?php } else if($row["chucvu"]=='Nhan vien kinh te'){?>
                        <td>Nhân viên kinh tế</td>
                    <?php }?>
					<td><a href="./admin_nhanvien_sua.php?ID=<?php echo $row["ID"]; ?>"><i class="fa-solid fa-pen-to-square icon icon1"></i></a>/<a href="./admin_nhanvien_xoa.php?ID=<?php echo $row["ID"]; ?>"><i class="fa-solid fa-trash icon icon2"></i></a></td>
                </tr>
			<?php }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php";?>