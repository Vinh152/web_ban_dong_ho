<?php 
include "./connect/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Animated Login Form</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
      <img src="img/bg.svg">
    </div>
    <div class="login-content">
      <form action="" method="POST">
        <h1 class="title">ĐĂNG KÝ</h1>
               <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="username" class="input">
                 </div>
               </div>
               <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Họ Tên</h5>
                    <input type="text" name="fullname" class="input">
                 </div>
               </div>
               <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="psw" class="input">
                 </div> 
               </div>
               <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Confirm Password</h5>
                    <input type="password" name="psw2" class="input">
                 </div> 
               
               </div>
               <!-- <div class="input-div pass">
               </div> -->
            <input type="submit" name="submit" class="btn" value="Đăng Ký">
         </form>
      </div>
      <?php
      if(isset($_POST["submit"]))
      {
         $hoten=$_POST["fullname"];
         $username=$_POST["username"];
         $password=$_POST["psw"];
         $password2=$_POST["psw2"];
         if($hoten!="" && $username!=""&& $password!=""&& $password2!="")
         {
            if($password==$password2)
            {
               $sql="INSERT INTO `login_khack`(`hoten`, `taikhoan`, `matkhau`) VALUES ('$hoten','$username','$password')";
               $query=mysqli_query($conn, $sql);
               echo "<script> alert('Chúc mừng bạn đã tạo thành công tài khoản') </script>";
               echo "<script type='text/javascript'>  window.location='../index.php'; </script>";
            }else{
            echo "<script> alert('Confirm password không trùng với password') </script>";
            echo "<script type='text/javascript'>  window.location='./dangky.php'; </script>";
            }
         }
         else{
            echo "<script> alert('Mời bạn điền đầy đủ thông tin') </script>";
            echo "<script type='text/javascript'>  window.location='./dangky.php'; </script>";
         }
      }
      ?>
   </div>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
