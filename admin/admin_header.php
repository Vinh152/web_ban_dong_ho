<?php
include "./connect/connect.php"; 
session_start();
if(isset($_SESSION["login_nhanvien"]))
{

}
else{
	echo "<script type='text/javascript'>  window.location='index.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ATPro Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="assets/AT-pro-logo.png"/>
	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="overlay-scrollbar">
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item">
				<img src="assets/AT-pro-black.png" alt="ATPro logo" class="logo logo-light">
				<img src="assets/AT-pro-white.png" alt="ATPro logo" class="logo logo-dark">
			</li>
		</ul>
		<!-- end nav left -->
		<!-- form -->
		<form class="navbar-search">
			<input type="text" name="Search" class="navbar-search-input" placeholder="What you looking for...">
			<i class="fas fa-search"></i>
		</form>
		<!-- end form -->
		<!-- nav right -->
		<ul class="navbar-nav nav-right">
			<li class="nav-item mode">
				<a class="nav-link" href="#" onclick="switchTheme()">
					<i class="fas fa-moon dark-icon"></i>
					<i class="fas fa-sun light-icon"></i>
				</a>
			</li>
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
				<?php 
				
				if(isset($_SESSION["login_nhanvien"]))
				{
					$hoten_nhanvien=$_SESSION["login_nhanvien"];
					$sql_login="SELECT * FROM `nhanvien` WHERE hoten= '$hoten_nhanvien'";
					$query_nhanvien=mysqli_query($conn, $sql_login);
					$row_nhanvien=mysqli_fetch_assoc($query_nhanvien);
				}
				?>
					<img src="./avatar/<?php echo $row_nhanvien["anh"];?>" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li  class="dropdown-menu-item">
							<a class="dropdown-menu-link">
								<div>
									<i class="fas fa-user-tie"></i>
								</div>
								<span>Profile</span>
							</a>
						</li>
						<li class="dropdown-menu-item">
							<a href="#" class="dropdown-menu-link">
								<div>
									<i class="fas fa-cog"></i>
								</div>
								<span>Settings</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="#" class="dropdown-menu-link">
								<div>
									<i class="far fa-credit-card"></i>
								</div>
								<span>Payments</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="#" class="dropdown-menu-link">
								<div>
									<i class="fas fa-spinner"></i>
								</div>
								<span>Projects</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="./admin_logout.php" class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<!-- end nav right -->
	</div>
	<!-- end navbar -->
	<!-- sidebar -->
	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="./admin_home.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-house"></i>
					</div>
					<span>
						Trang chủ
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="./admin_sanpham.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-box"></i>
					</div>
					<span>Sản phẩm</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="./admin_hang.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-box"></i>
					</div>
					<span>Hãng sản phẩm</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="./admin_donhang.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-money-bill"></i>
					</div>
					<span>Đơn hàng</span>
				</a>
			</li>

			<li  class="sidebar-nav-item">
				<a href="./admin_tintuc.php" class="sidebar-nav-link">
					<div>
					<i class="fa-solid fa-newspaper"></i>
					</div>
					<span>Tin tức</span>
				</a>
			</li>


			<li  class="sidebar-nav-item">
				<a href="./admin_doanhthu.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-wallet"></i>
					</div>
					<span>Doanh thu</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="./admin_nhanvien.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-user"></i>
					</div>
					<span>Nhân viên</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="./admin_lienhe.php" class="sidebar-nav-link">
					<div>
						<i class="fa-solid fa-comment"></i>
					</div>
					<span>Nhận xét</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->