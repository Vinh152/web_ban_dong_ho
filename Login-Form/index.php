<?php 
include "./connect/connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css//style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" name="submit" class="btn" value="Login">
            <div>
              <button class="btn"><a href="dangky.php">Đăng ký</a></button>  
            </div>
            </form>   
        </div>
		<?php
	if(isset($_POST["submit"]))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		$sql="SELECT * FROM `login_khack` WHERE taikhoan='$username' and matkhau='$password'";
		$query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_assoc($query);
		if($row)
		{
			$_SESSION["login"]=$username;
			echo "<script> alert('Chào mừng". $_SESSION["login"]."đã đăng nhập') </script>";
			echo "<script type='text/javascript'>  window.location='../index.php'; </script>";
		}
		else{
			echo "<script> alert('Sai mật khẩu hoặc password') </script>";
		}
	}
	?>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
