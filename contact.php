<?php
include "./connect/connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
     <!-- thư viện slick slider  -->
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
     <!-- thư viện animation AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.0.2/aos.css">
    <!-- thư viện animation WOW -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <!-- link của icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="./CSS/contact.css">
</head>
<body>
    <?php include"./header.php"?>
<!-- hết phần header  -->

<!-- làm phần main -->
<div class="main">
    <div class="container">
        <div class="main-1">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.4023575075466!2d105.80557331538935!3d21.016580793568806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab60b64b6333%3A0xb87e2e511eabfce1!2zVHLGsOG7nW5nIMSQw6BvIHThuqFvIE3hu7kgdGh14bqtdCDEkGEgcGjGsMahbmcgdGnhu4duIEFyZW5hIE11bHRpbWVkaWE!5e0!3m2!1svi!2s!4v1628044836790!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="main-2">
            <div class="main-2-item">
                <div class="main-2-item-img">
                    <img src="./contact/contact1.PNG" alt="">
                </div>
                <div class="main-2-item-text">
                    <h2>Địa chỉ</h2>
                    <p>319 C16 Lý Thường Kiệt, Phường 15, Quận 11, Tp.HCM</p>
                </div>
            </div>


            <div class="main-2-item">
                <div class="main-2-item-img">
                    <img src="./contact/contact2.PNG" alt="">
                </div>
                <div class="main-2-item-text">
                    <h2>Điện thoại:</h2>
                    <p><a href="">1900 636 648</a></p>
                    <p>Bấm 109 – Phòng kinh doanh</p>
                    <p>Bấm 103 – Phòng kỹ thuật</p>
                </div>
            </div>



            <div class="main-2-item">
                <div class="main-2-item-img">
                    <img src="./contact/contact3.PNG" alt="">
                </div>
                <div class="main-2-item-text">
                    <h2>Email:</h2>
                    <p><a href="" class="main-2-item-text-link">demonhunterg@gmail.com</a></p>
                    <p><a href="" class="main-2-item-text-link">mon@mona.media</a></p>
                </div>
            </div>
        </div>




        <div class="main-3">
            <form action="" method="POST">
                <div class="main-3-container">
                    <div class="main-3-item1">
                        <div class="main-3-item1-item">
                            <input class="main-3-item1-item-input" type="text" placeholder="Họ và tên" name="hoten">
                        </div>
    
                        <div class="main-3-item1-item">
                            <input class="main-3-item1-item-input" type="email" placeholder="Email" name="email">
                        </div>
    
    
                        <div class="main-3-item1-item" style="width: 100%;">
                            <input class="main-3-item1-item-input" type="text" placeholder="Số điện thoại" name="sdt">
                        </div>
                    </div>


                    <div class="main-3-item2">
                        <textarea id="" cols="30" rows="7" placeholder="Lời nhắn" name="comment"></textarea>
                    </div>

                    <div class="main-3-item3">
                        <input type="submit" value="Gửi" name="gui">
                    </div>
            </div>
            </form>
        </div>

        <?php
        if(isset($_POST["gui"]))
        {
            $hoten=$_POST["hoten"];
            $email=$_POST["email"];
            $sdt=$_POST["sdt"];
            $comment=$_POST["comment"];
            if($hoten!="" && $email!="" && $sdt!="" && $comment!="")
            {
                $sql="INSERT INTO `lienhe`(`hoten`, `email`, `sdt`, `noidung`) VALUES ('$hoten','$email','$sdt','$comment')";
                $query=mysqli_query($conn, $sql);
                echo "<script> alert('Gửi thành công thông tin liên hệ'); </script>";
            }
            else{
                echo "<script> alert('Mời nhập đầy đủ thông tin'); </script>";
            }
        }
        ?>
    </div>


    <div class="main-7">
        <form action="">
            <div class="container">
                <div class="main-7-s">
                       <div class="main-7-tittle">
                           <h2>ĐĂNG KÝ NHẬN THÔNG TIN</h2>
                       </div>
                       <div class="main-7-search">
                           <input type="text" placeholder="Tìm kiếm..." id="main-7-search-input">
                           <button type="submit" id="main-7-search-btn">Đăng ký</button>
                       </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- hết phần main -->











<!-- làm phần footer  -->
<footer>
    <div class="container">
        <div class="footer-s">
         <div class="row2">
 
 
             <div class="footer-item footer-item-1">
                 <h2 class="footer-item-tittle">THÔNG TIN LIÊN HỆ</h2>
                 <div class="footer-item-list">
 
 
                     <div class="footer-item-list-item">
                         <div class="footer-item-list-item-icon">
                             <i class="fas fa-map-marker-alt"></i>
                         </div>
                         <div class="footer-item-list-item-text">
                             <p><a href="">319 C16 Lý Thường Kiệt, Phường 15, Quận 11, Tp.HCM</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         <div class="footer-item-list-item-icon">
                             <i class="fas fa-phone-alt"></i>
                         </div>
                         <div class="footer-item-list-item-text">
                             <p><a href="">076 922 0162</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         <div class="footer-item-list-item-icon">
                             <i class="fas fa-envelope-open-text"></i>
                         </div>
                         <div class="footer-item-list-item-text">
                             <p><a href="">demonhunterg@gmail.com
                                 mon@mona.media</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         <div class="footer-item-list-item-icon">
                             <i class="fab fa-skype"></i>
                         </div>
                         <div class="footer-item-list-item-text">
                             <p><a href="">demonhunterp</a></p>
                         </div>
                     </div>
 
 
                 </div>
                 <div class="footer-item-icon">
                     <div class="footer-item-icon-item footer-item-icon-item-face">
                         <a href=""><i class="fab fa-facebook-f"></i></a>
                     </div>
                     <div class="footer-item-icon-item footer-item-icon-item-insta">
                         <a href=""><i class="fab fa-instagram"></i></a>
                     </div>
                     <div class="footer-item-icon-item footer-item-icon-item-twitter">
                         <a href=""><i class="fab fa-twitter"></i></a>
                     </div>
                     <div class="footer-item-icon-item footer-item-icon-item-wifi">
                         <a href=""><i class="fas fa-wifi"></i></a>
                     </div>
                     <div class="footer-item-icon-item footer-item-icon-item-linked">
                         <a href=""><i class="fab fa-linkedin-in"></i></a>
                     </div>
                 </div>
             </div>
 
 
                <div class="footer-item footer-item-1">
                 <h2 class="footer-item-tittle">LIÊN KẾT</h2>
                 <div class="footer-item-list">
 
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.html">Giới thiệu</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text ">
                             <p><a href="./product-boy.html">Đồng hồ nam</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./product-girl.html">Đồng hồ nữ</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./news.html" >Blogs</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./contact.html" class="footer-active">Liên hệ</a></p>
                         </div>
                     </div>
 
                 </div>
             </div>
 
 
 
             <div class="footer-item footer-item-1">
                 <h2 class="footer-item-tittle">HỖ TRỢ</h2>
                 <div class="footer-item-list">
 
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.html">Hướng dẫn mua hàng</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.html">Hướng dẫn thanh toán</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.html">Chính sách bảo hành</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                       
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.html">Chính sách đổi trả</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                     
                         <div class="footer-item-list-item-text">
                             <p><a href="./contact.html">Tư vấn khách hàng</a></p>
                         </div>
                     </div>
 
                 </div>
             </div>
 
             <div class="footer-item footer-item-4">
                 <h2 class="footer-item-tittle">TẢI ỨNG DỤNG TRÊN</h2>
                 <div class="footer-item-list">
 
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="">Ứng dụng Mona Watch hiện có sẵn trên Google Play & App Store. Tải nó ngay.</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         <img class="footer-item-list-item-img" src="http://mauweb.monamedia.net/donghohaitrieu/wp-content/uploads/2019/07/img-googleplay.jpg" alt="">
                     </div>
 
                     <div class="footer-item-list-item">
                         <img class="footer-item-list-item-img" src="http://mauweb.monamedia.net/donghohaitrieu/wp-content/uploads/2019/07/img-appstore.jpg" alt="">
                     </div>
                 </div>
             </div>
         </div>
        </div>
    </div>
    <h3 class="footer-banquyen">@Bản quyền thuộc về lương ngọc vinh</h3>
 </footer>
<!-- hết phần footer -->
 <!-- thư viện js của jquery -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- thư viện js của AOS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.0.2/aos.js"></script>
</body>
</html>