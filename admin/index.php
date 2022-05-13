<?php include "./connect/connect.php";
session_start();
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML | CodingNepal</title>
      <link rel="stylesheet" href="./CSS/login.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="" class="login" method="POST">
                  <div class="field">
                     <input type="text" placeholder="Tài khoản" required name="login_taikhoan">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Mật khẩu" required name="login_matkhau">
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login" name="login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <?php
               if(isset($_POST["login"]))
               {
                  $login_taikhoan=$_POST["login_taikhoan"];
                  $login_matkhau=$_POST["login_matkhau"];
                  $sql="select * from login_nhanvien where taikhoan='$login_taikhoan' and matkhau=$login_matkhau";
                  $query=mysqli_query($conn, $sql) or die( mysqli_error($conn));
                  $row=mysqli_fetch_array($query);
                  print_r($row);
                  $cauchaomung="Chào mừng $login_taikhoan đăng nhập";
                  if($row)
                  {
                     $_SESSION["login_nhanvien"]=$row["hoten"];
                     echo "<script>alert('Đăng nhập thành công');</script>";
                     echo "<script type='text/javascript'>  window.location='admin_home.php'; </script>";
                  }
                  else{
                     echo "<script>alert('Sai mật khẩu hoặc tài khoản');</script>";
                  }
               }
               ?>
               <form action="" class="signup" method="POST">
                  <div class="field">
                     <input type="text" placeholder="ID nhân viên" required name="signup_id">
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Họ và tên" required name="signup_hoten">
                  </div>
                  <div class="field">
                     <input type="text" placeholder="Tài khoản" required name="signup_taikhoan">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Mật khẩu" required name="signup_matkhau">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup" name="signup">
                  </div>
               </form>

               <?php
               if(isset($_POST["signup"]))
               {
                  $signup_id=$_POST["signup_id"];
                  $signup_hoten=$_POST["signup_hoten"];
                  $signup_taikhoan=$_POST["signup_taikhoan"];
                  $signup_matkhau=$_POST["signup_matkhau"];
                  $sql="INSERT INTO `login_nhanvien`(`ID`, `hoten`, `taikhoan`, `matkhau`) VALUES ('$signup_id','$signup_hoten','$signup_taikhoan','$signup_matkhau')";
                  $query=mysqli_query($conn, $sql);
                  if($query==1)
                  {
                   echo "<script>alert('Đăng ký tài khoản thành công');</script>";  
                  }
                  else{
                     echo "<script>alert('Đăng ký tài khoản không thành công');</script>";
                  }
               }
               ?>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>