<?php include "./admin_header.php"?>
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
	<!-- main content -->
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin các hãng đồng hồ</h1>
		<p class="mainRight_btnADD"><a href="./admin_sanpham_them.php">Thêm hãng</a></p>
		</div>
        <form class="mainRight_search" method="GET">
            <div class="mainRight_search_item">
            <p class="mainRight_search_text-short">Hãng</p>
            <input type="text" name="hang">
            </div>
            <button class="mainRIght_search_btn" type="submit" name="search_hang">Gửi</button>
        </form>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên hãng</th>    
                    <th>Chức năng</th>                
                </tr>
			<?php
            if(isset($_GET["search_hang"]))
            {
                $hang=$_GET["hang"];
                if($hang!="")
                {
                    $sql="SELECT * FROM `hang` WHERE ID_hang='$hang'";
                }
                else{
                    $sql="SELECT * FROM `hang`";
                    echo '<script> alert("Mời nhập thông tin tên hãng"); </script>';
                }
            }
            else{
                $sql="SELECT * FROM `hang`";
            }
			$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
                echo print_r($row);
			?>
                <tr>
                    <td><?php echo $row["ID_hang"]?></td>
                    <td><?php echo $row["tenhang"]?></td>
					<td><a href="./admin_hang_sua.php?id=<?php echo $row["ID_hang"]; ?>"><i class="fa-solid fa-pen-to-square icon icon1"></i></a>/<a href="./admin_hang_xoa.php?id=<?php echo $row["ID_hang"]; ?>"><i class="fa-solid fa-trash icon icon2"></i></a></td>
                    
                </tr>
			<?php }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
	<?php include"./admin_footer.php"?>