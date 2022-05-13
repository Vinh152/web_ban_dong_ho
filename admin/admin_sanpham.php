<?php include "./admin_header.php"?>
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
	<!-- main content -->
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin sản phẩm</h1>
		<p class="mainRight_btnADD"><a href="./admin_sanpham_them.php">Thêm sản phẩm</a></p>
		</div>
        <form class="mainRight_search" method="GET">
            <div class="mainRight_search_item">
            <p class="mainRight_search_text-short">Sản phẩm</p>
            <input type="text" name="sanpham">
            </div>
            <button class="mainRIght_search_btn" type="submit" name="search_sanpham">Gửi</button>
        </form>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá mới</th>
                    <th>Giá cũ</th>
                    <th>Số lượng</th>
                    <th>Ảnh gốc</th>
                    <th>Ảnh 1</th>
                    <th>Ảnh 2</th>
                    <th>Ảnh 3</th>
                    <th>Ảnh 4</th>
                    <th>Phân loại</th>
                    <th>Thể loại</th>
                    <th>Chi tiết</th>
					<th>Chức năng</th>
                    
                </tr>
			<?php
            if(isset($_GET["search_sanpham"]))
            {
                $sanpham=$_GET["sanpham"];
                if($sanpham!="")
                {
                    $sql="select * from sanpham where tensanpham='$sanpham'";
                }
                else{
                    $sql="select * from sanpham";
                    echo '<script> alert("Mời nhập thông tin tên sản phẩm"); </script>';
                }
            }
            else{
                $sql="select * from sanpham";
            }
			$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
			?>
                <tr>
                    <td><?php echo $row["ID"]?></td>
                    <td><?php echo $row["tensanpham"]?></td>
                    <td><?php echo $row["giamoi"]?></td>
                    <td><?php echo $row["giacu"]?></td>
                    <td><?php echo $row["soluong"]?></td>
                    <td><img class="mainRight_table_anh" src="../sanpham/<?php echo $row['anhgoc']?>" alt=""></td>
					<td><img class="mainRight_table_anh" src="../sanpham/<?php echo $row['anh1']?>" alt=""></td>
					<td><img class="mainRight_table_anh" src="../sanpham/<?php echo $row['anh2']?>" alt=""></td>
					<td><img class="mainRight_table_anh" src="../sanpham/<?php echo $row['anh3']?>" alt=""></td>
					<td><img class="mainRight_table_anh" src="../sanpham/<?php echo $row['anh4']?>" alt=""></td>
                    <td><?php
                    $id_hang=$row["ID_hang"];
                    $sql_hang="select * from hang where ID_hang=$id_hang";
                    $query_hang=mysqli_query($conn, $sql_hang);
                    $row_hang=mysqli_fetch_assoc($query_hang);
                    echo $row_hang["tenhang"];
                    ?></td>
                    <?php if($row["theloai"]=='dong ho co'){?>
                    <td>Đồng hồ cơ</td>
                    <?php } else {?>
                    <td>Đồng hồ thông minh</td>
                    <?php }?>
                    <td><p><a href="./admin_chitietsanpham.php?id=<?php echo $row["ID"]; ?>">Chi tiết sản phẩm</a></td>
					<td><a href="./admin_sanpham_sua.php?id=<?php echo $row["ID"]; ?>"><i class="fa-solid fa-pen-to-square icon icon1"></i></a>/<a href="./admin_sanpham_xoa.php?id=<?php echo $row["ID"]; ?>"><i class="fa-solid fa-trash icon icon2"></i></a></td>
                    
                </tr>
			<?php }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
	<?php include"./admin_footer.php"?>