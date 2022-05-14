<?php include "./admin_header.php"?>
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
	<!-- main content -->
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin các tin tức</h1>
		<p class="mainRight_btnADD"><a href="./admin_tintuc_them.php">Thêm tin tức</a></p>
		</div>
        <form class="mainRight_search" method="GET">
            <div class="mainRight_search_item">
            <p class="mainRight_search_text-short">Tin tức</p>
            <input type="text" name="tintuc">
            </div>
            <button class="mainRIght_search_btn" type="submit" name="search_tintuc">Gửi</button>
        </form>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>    
                    <th>Ảnh</th>
                    <th>Lời nói ngắn</th>
                    <th>Thời gian</th>
                    <th>Chức năng</th>                
                </tr>
			<?php
            if(isset($_GET["search_tintuc"]))
            {
                $tintuc=$_GET["tintuc"];
                if($tintuc!="")
                {
                    $sql="SELECT * FROM `tintuc` WHERE ID_tintuc='$tintuc'";
                }
                else{
                    $sql="SELECT * FROM `tintuc`";
                    echo '<script> alert("Mời nhập thông tin tên hãng"); </script>';
                }
            }
            else{
                $sql="SELECT * FROM `tintuc`";
            }
			$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
			?>
                <tr>
                    <td><?php echo $row["ID_tintuc"]?></td>
                    <td><?php echo $row["tieude"]?></td>
                    <td><img class="mainRight_table_anh" src="../News/<?php echo $row['anh']?>" alt=""></td>
                    <td><?php echo $row["loinoingan"]?></td>
                    <td><?php echo $row["thoigian"]?></td>
					<td><a href="./admin_tintuc_sua.php?id=<?php echo $row["ID_tintuc"]; ?>"><i class="fa-solid fa-pen-to-square icon icon1"></i></a>/<a href="./admin_tintuc_xoa.php?id=<?php echo $row["ID_tintuc"]; ?>"><i class="fa-solid fa-trash icon icon2"></i></a></td>
                    
                </tr>
			<?php }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
	<?php include"./admin_footer.php"?>