<?php include"./admin_header.php"?>
	<!-- main content -->
	<div class="wrapper">
		<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
					<i class="fa-solid fa-box"></i>
					</p>
					<h3><?php
					$sql_hang="select count(*) as soluong from hang";
					$quey_hang=mysqli_query($conn, $sql_hang);
					$hang_count=mysqli_fetch_assoc($quey_hang);
					echo $hang_count["soluong"];
					?></h3>
					<p>Hãng sản phẩm</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fas fa-spinner"></i>
					</p>
					<h3><?php
					$sql_sanpham="select count(*) as soluong from sanpham";
					$quey_sanpham=mysqli_query($conn, $sql_sanpham);
					$sanpham_count=mysqli_fetch_assoc($quey_sanpham);
					echo $sanpham_count["soluong"];
					?></h3>
					<p>Sản phẩm</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
					<i class="fa-solid fa-user"></i>
					</p>
					<h3><?php
					$sql_nhanvien="select count(*) as soluong from nhanvien";
					$quey_nhanvien=mysqli_query($conn, $sql_nhanvien);
					$nhanvien_count=mysqli_fetch_assoc($quey_nhanvien);
					echo $nhanvien_count["soluong"];
					?></h3>
					<p>Nhân viên</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-danger">
					<p>
					<i class="fa-solid fa-cart-arrow-down"></i>
					</p>
					<h3><?php
					$sql_donhang="select count(*) as soluong from giohang";
					$quey_donhang=mysqli_query($conn, $sql_donhang);
					$donhang_count=mysqli_fetch_assoc($quey_donhang);
					echo $donhang_count["soluong"];
					?></h3>
					<p>Đơn hàng</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Trưởng chi nhánh
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>ID nhân viên</th>
									<th>Tên nhân viên</th>
									<th>Giới tính</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql="select * from nhanvien where chucvu='truong chi nhanh'";
								$query=mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($query))
			{
								?>
								<tr>
									<td><?php echo $row['ID']?></td>
									<td><?php echo $row['hoten']?></td>
									<td><?php if($row['sex']==1){
										echo "Nam";} else{ echo 'Nữ';};?></td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- <div class="col-4 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Progress bar
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<div class="progress-wrapper">
							<p>
								Less than 1 hour
								<span class="float-right">50%</span>
							</p>
							<div class="progress">
								<div class="bg-success" style="width: 50%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								1 - 3 hours
								<span class="float-right">60%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:60%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								More than 3 hours
								<span class="float-right">40%</span>
							</p>
							<div class="progress">
								<div class="bg-warning" style="width:40%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								More than 6 hours
								<span class="float-right">20%</span>
							</p>
							<div class="progress">
								<div class="bg-danger" style="width:20%"></div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<?php
$date=getdate();
$now=$date['year'];
$before=$date['year']-1;
		?>
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
			Bảng thống kê trong năm <?php echo $now?> và năm <?php echo $before?>
						<?php
$toida=100000000;

$sql_thang1="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=1 and YEAR(thoigiandat)=$now";
$query_thang1=mysqli_query($conn, $sql_thang1);
$tien_thang1=mysqli_fetch_assoc($query_thang1);
if(isset($tien_thang1['tongtien']))
{
	$tongtien_thang1=($tien_thang1['tongtien']/$toida)*100;
}
else{
	$tongtien_thang1=0;
}

$sql_thang2="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=2 and YEAR(thoigiandat)=2022";
$query_thang2=mysqli_query($conn, $sql_thang2);
$tien_thang2=mysqli_fetch_assoc($query_thang2);
if(isset($tien_thang2['tongtien']))
{
	$tongtien_thang2=($tien_thang2['tongtien']/$toida)*100;
}
else{
	$tongtien_thang2=0;
}

$sql_thang3="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=3 and YEAR(thoigiandat)=$now";
$query_thang3=mysqli_query($conn, $sql_thang3);
$tien_thang3=mysqli_fetch_assoc($query_thang3);
if(isset($tien_thang3['tongtien']))
{
	$tongtien_thang3=($tien_thang3['tongtien']/$toida)*100;
}
else{
	$tongtien_thang3=0;
}

$sql_thang4="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=4 and YEAR(thoigiandat)=$now";
$query_thang4=mysqli_query($conn, $sql_thang4);
$tien_thang4=mysqli_fetch_assoc($query_thang4);
if(isset($tien_thang4['tongtien']))
{
	$tongtien_thang4=($tien_thang4['tongtien']/$toida)*100;
}
else{
	$tongtien_thang4=0;
}

$sql_thang5="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=5 and YEAR(thoigiandat)=$now";
$query_thang5=mysqli_query($conn, $sql_thang5);
$tien_thang5=mysqli_fetch_assoc($query_thang5);
if(isset($tien_thang5['tongtien']))
{
	$tongtien_thang5=($tien_thang5['tongtien']/$toida)*100;
}
else{
	$tongtien_thang5=0;
}

$sql_thang6="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=6 and YEAR(thoigiandat)=$now";
$query_thang6=mysqli_query($conn, $sql_thang6);
$tien_thang6=mysqli_fetch_assoc($query_thang6);
if(isset($tien_thang6['tongtien']))
{
	$tongtien_thang6=($tien_thang6['tongtien']/$toida)*100;
}
else{
	$tongtien_thang6=0;
}

$sql_thang7="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=7 and YEAR(thoigiandat)=$now";
$query_thang7=mysqli_query($conn, $sql_thang7);
$tien_thang7=mysqli_fetch_assoc($query_thang7);
if(isset($tien_thang7['tongtien']))
{
	$tongtien_thang7=($tien_thang7['tongtien']/$toida)*100;
}
else{
	$tongtien_thang7=0;
}

$sql_thang8="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=8 and YEAR(thoigiandat)=$now";
$query_thang8=mysqli_query($conn, $sql_thang8);
$tien_thang8=mysqli_fetch_assoc($query_thang8);
if(isset($tien_thang8['tongtien']))
{
	$tongtien_thang8=($tien_thang8['tongtien']/$toida)*100;
}
else{
	$tongtien_thang8=0;
}

$sql_thang9="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=9 and YEAR(thoigiandat)=$now";
$query_thang9=mysqli_query($conn, $sql_thang9);
$tien_thang9=mysqli_fetch_assoc($query_thang9);
if(isset($tien_thang9['tongtien']))
{
	$tongtien_thang9=($tien_thang9['tongtien']/$toida)*100;
}
else{
	$tongtien_thang9=0;
}

$sql_thang10="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=10 and YEAR(thoigiandat)=$now";
$query_thang10=mysqli_query($conn, $sql_thang10);
$tien_thang10=mysqli_fetch_assoc($query_thang10);
if(isset($tien_thang10['tongtien']))
{
	$tongtien_thang10=($tien_thang10['tongtien']/$toida)*100;
}
else{
	$tongtien_thang10=0;
}

$sql_thang11="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=11 and YEAR(thoigiandat)=$now";
$query_thang11=mysqli_query($conn, $sql_thang11);
$tien_thang11=mysqli_fetch_assoc($query_thang11);
if(isset($tien_thang11['tongtien']))
{
	$tongtien_thang11=($tien_thang11['tongtien']/$toida)*100;
}
else{
	$tongtien_thang11=0;
}

$sql_thang12="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=12 and YEAR(thoigiandat)=$now";
$query_thang12=mysqli_query($conn, $sql_thang12);
$tien_thang12=mysqli_fetch_assoc($query_thang12);
if(isset($tien_thang12['tongtien']))
{
	$tongtien_thang12=($tien_thang12['tongtien']/$toida)*100;
}
else{
	$tongtien_thang12=0;
}
// của năm cũ (lấy năm hiện tại -1)
$sql_thang1_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=1 and YEAR(thoigiandat)=$before";
$query_thang1_truoc=mysqli_query($conn, $sql_thang1_truoc);
$tien_thang1_truoc=mysqli_fetch_assoc($query_thang1_truoc);
if(isset($tien_thang1_truoc['tongtien']))
{
	$tongtien_thang1_truoc=($tien_thang1_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang1_truoc=0;
}

$sql_thang2_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=2 and YEAR(thoigiandat)=$before";
$query_thang2_truoc=mysqli_query($conn, $sql_thang2_truoc);
$tien_thang2_truoc=mysqli_fetch_assoc($query_thang2_truoc);
if(isset($tien_thang2_truoc['tongtien']))
{
	$tongtien_thang2_truoc=($tien_thang2_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang2_truoc=0;
}

$sql_thang3_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=3 and YEAR(thoigiandat)=$before";
$query_thang3_truoc=mysqli_query($conn, $sql_thang3_truoc);
$tien_thang3_truoc=mysqli_fetch_assoc($query_thang3_truoc);
if(isset($tien_thang3_truoc['tongtien']))
{
	$tongtien_thang3_truoc=($tien_thang3_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang3_truoc=0;
}

$sql_thang4_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=4 and YEAR(thoigiandat)=$before";
$query_thang4_truoc=mysqli_query($conn, $sql_thang4_truoc);
$tien_thang4_truoc=mysqli_fetch_assoc($query_thang4_truoc);
if(isset($tien_thang4_truoc['tongtien']))
{
	$tongtien_thang4_truoc=($tien_thang4_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang4_truoc=0;
}

$sql_thang5_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=5 and YEAR(thoigiandat)=$before";
$query_thang5_truoc=mysqli_query($conn, $sql_thang5_truoc);
$tien_thang5_truoc=mysqli_fetch_assoc($query_thang5_truoc);
if(isset($tien_thang5_truoc['tongtien']))
{
	$tongtien_thang5_truoc=($tien_thang5_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang5_truoc=0;
}

$sql_thang6_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=6 and YEAR(thoigiandat)=$before";
$query_thang6_truoc=mysqli_query($conn, $sql_thang6_truoc);
$tien_thang6_truoc=mysqli_fetch_assoc($query_thang6_truoc);
if(isset($tien_thang6_truoc['tongtien']))
{
	$tongtien_thang6_truoc=($tien_thang6_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang6_truoc=0;
}

$sql_thang7_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=7 and YEAR(thoigiandat)=$before";
$query_thang7_truoc=mysqli_query($conn, $sql_thang7_truoc);
$tien_thang7_truoc=mysqli_fetch_assoc($query_thang7_truoc);
if(isset($tien_thang7_truoc['tongtien']))
{
	$tongtien_thang7_truoc=($tien_thang7_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang7_truoc=0;
}

$sql_thang8_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=8 and YEAR(thoigiandat)=$before";
$query_thang8_truoc=mysqli_query($conn, $sql_thang8_truoc);
$tien_thang8_truoc=mysqli_fetch_assoc($query_thang8_truoc);
if(isset($tien_thang8_truoc['tongtien']))
{
	$tongtien_thang8_truoc=($tien_thang8_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang8_truoc=0;
}

$sql_thang9_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=9 and YEAR(thoigiandat)=$before";
$query_thang9_truoc=mysqli_query($conn, $sql_thang9_truoc);
$tien_thang9_truoc=mysqli_fetch_assoc($query_thang9_truoc);
if(isset($tien_thang9_truoc['tongtien']))
{
	$tongtien_thang9_truoc=($tien_thang9_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang9_truoc=0;
}

$sql_thang10_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=10 and YEAR(thoigiandat)=$before";
$query_thang10_truoc=mysqli_query($conn, $sql_thang10_truoc);
$tien_thang10_truoc=mysqli_fetch_assoc($query_thang10_truoc);
if(isset($tien_thang10_truoc['tongtien']))
{
	$tongtien_thang10_truoc=($tien_thang10_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang10_truoc=0;
}

$sql_thang11_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=11 and YEAR(thoigiandat)=$before";
$query_thang11_truoc=mysqli_query($conn, $sql_thang11_truoc);
$tien_thang11_truoc=mysqli_fetch_assoc($query_thang11_truoc);
if(isset($tien_thang11_truoc['tongtien']))
{
	$tongtien_thang11_truoc=($tien_thang11_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang11_truoc=0;
}

$sql_thang12_truoc="SELECT SUM(tong) as 'tongtien'  FROM `giohang` WHERE MONTH(thoigiandat)=12 and YEAR(thoigiandat)=$before";
$query_thang12_truoc=mysqli_query($conn, $sql_thang12_truoc);
$tien_thang12_truoc=mysqli_fetch_assoc($query_thang12_truoc);
if(isset($tien_thang12_truoc['tongtien']))
{
	$tongtien_thang12_truoc=($tien_thang12_truoc['tongtien']/$toida)*100;
}
else{
	$tongtien_thang12_truoc=0;
}


?>
						</h3>
					</div>
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end main content -->
	<!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="index.js"></script>
	<script>
		var ctx = document.getElementById('myChart')
ctx.height = 500
ctx.width = 500
var data = {
	labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
	datasets: [{
		fill: false,
		label: '<?php echo $now?>',
		borderColor: successColor,
		data: [<?php echo $tongtien_thang1?>, <?php echo $tongtien_thang2?>, <?php echo $tongtien_thang3?>, <?php echo $tongtien_thang4?>, <?php echo $tongtien_thang5?>, <?php echo $tongtien_thang6?>, <?php echo $tongtien_thang7?>, <?php echo $tongtien_thang8?>, <?php echo $tongtien_thang9?>, <?php echo $tongtien_thang10?>, <?php echo $tongtien_thang11?>, <?php echo $tongtien_thang12?>],
		borderWidth: 2,
		lineTension: 0,
	}, {
		fill: false,
		label: '<?php echo $before?>',
		borderColor: dangerColor,
		data: [<?php echo $tongtien_thang1_truoc?>, <?php echo $tongtien_thang2_truoc?>, <?php echo $tongtien_thang3_truoc?>, <?php echo $tongtien_thang4_truoc?>, <?php echo $tongtien_thang5_truoc?>, <?php echo $tongtien_thang6_truoc?>, <?php echo $tongtien_thang7_truoc?>, <?php echo $tongtien_thang8_truoc?>, <?php echo $tongtien_thang9_truoc?>, <?php echo $tongtien_thang10_truoc?>, <?php echo $tongtien_thang11_truoc?>, <?php echo $tongtien_thang12_truoc?>],
		borderWidth: 2,
		lineTension: 0,
	}]
}

var lineChart = new Chart(ctx, {
	type: 'line',
	data: data,
	options: {
		maintainAspectRatio: false,
		bezierCurve: false,
	}
});
	</script>
	<!-- end import script -->
</body>
</html>