<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle" style="width: 100%;">Thông tin liên hệ khách hàng</h1>
		</div>
        <form class="mainRight_search" method="GET">
            <div class="mainRight_search_item">
            <p class="mainRight_search_text-short">Họ tên</p>
            <input type="text" name="hoten">
            </div>
            <button class="mainRIght_search_btn" type="submit" name="search_hoten">Gửi</button>
        </form>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên khách hàng</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Nội dung</th>
                    
                </tr>
			<?php
            if(isset($_GET["search_hoten"]))
            {
                $hoten=$_GET["hoten"];
                if($hoten!="")
                {
                    $sql="select * from lienhe where hoten='$hoten'";
                }
                else{
                    $sql="select * from lienhe";
                    echo '<script> alert("Mời nhập thông tin họ tên"); </script>';
                }
            }
            else{
                $sql="select * from lienhe";
            }
			$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
			?>
                <tr>
                    <td><?php echo $row["ID"]?></td>
                    <td class="color-red text-uppercase"><?php echo $row["hoten"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["sdt"]?></td>
                    <td><?php echo $row["noidung"]?></td>
                </tr>
			<?php }?>
            </table>
        </div>
    </div>
	<!-- end main content -->
	<!-- import script -->
	<?php include"./admin_footer.php";?>