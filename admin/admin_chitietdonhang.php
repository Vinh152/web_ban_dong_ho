<?php include"./admin_header.php";?>
	<!-- main content -->
	<link rel="stylesheet" href="./CSS/admin_sanpham.css">
    <link rel="stylesheet" href="./CSS/admin_chitietdonhang.css">
    <div class="wrapper">
        <div class="mainRight_header">
		<h1 class="mainRight_tittle">Thông tin đơn hàng <?php echo $id=$_GET["ID"];?> </h1>
		</div>
        <div class="mainRight_table">
            <table>
                <tr>
                    <th>ID giỏ hàng</th>
                    <th>ID sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
				<?php
        if(isset($_GET["ID"]))
        {
        $id=$_GET["ID"];
        $sql="select * from chitietdonhang where ID_giohang=$id";
		$query=mysqli_query($conn, $sql);
		while($row=mysqli_fetch_assoc($query))
		{
        ?>
                <tr>
                   <td><?php echo $row["ID_giohang"]?></td>
                   <td><?php echo $row["ID_sanpham"]?></td>
                   <td><?php echo $row["tensanpham"]?></td>
                   <td><img class="anhsanpham" src="../sanpham/<?php echo $row["anhgoc"]?>" alt=""></td>
                   <td><?php echo number_format($row["gia"])?></td>
                   <td><?php echo $row["soluong"]?></td>
                   <td><?php echo number_format($row["gia"]*$row["soluong"]);?></td>
                </tr>
			<?php } } else{
                echo "Lỗi lấy ID_donhang";
            }?>
            </table>
            
        </div>
    </div>
	<!-- end main content -->
	<?php include"./admin_footer.php";?>