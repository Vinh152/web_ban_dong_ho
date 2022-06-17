<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
     <link rel="stylesheet" href="./CSS/cart.css">
</head>
<body>
    <?php include"./header.php";?>
<!-- hết phần header  -->
<!-- làm phần main -->
<div class="main">
<div class="main-1">
    <div class="container">
        <div class="main-1-frame">
            <div class="main-1-left">
                <div class="main-1-left-tittle">
                    <ul>
                        <li class="main-1-left-tittle-sanpham">Sản phẩm</li>
                        <li class="main-1-left-tittle-gia">Giá</li>
                        <li class="main-1-left-tittle-soluong">số lượng</li>
                        <li class="main-1-left-tittle-tong">tổng</li>
                    </ul>
                </div>
                <div class="main-1-left-cart">
                <?php
                $tongtien=0;
                $thanhtoan=0;
                if(isset($_SESSION["cart"]))
                {
                    foreach($_SESSION["cart"] as $cart_item)
                    { 
                        $tongtien=$cart_item["gia"]*$cart_item["soluong"];
                        $thanhtoan=$thanhtoan+$tongtien;
                        $_SESSION['thanhtoan']=$thanhtoan;
                    ?>
                    <div class="main-1-left-cart-item">
                        <p class="main-1-left-cart-item-delete"><a href="./testcart.php?xoa=<?php echo $cart_item["id"]?>"><i class="far fa-times-circle"></i></a></p>
                        <div class="main-1-left-cart-item-img">
                            <img src="./sanpham/<?php echo $cart_item["anh"]?>" alt="">
                        </div>
                        <p class="main-1-left-cart-item-name"><?php echo $cart_item["ten"]?></p>
                        <p class="main-1-left-cart-item-price"><?php echo number_format($cart_item["gia"])?></p>
                        <div class="main-1-left-cart-item-quantity">
                            <p class="main-1-left-cart-item-quantity-btn"><a href="./testcart.php?themsoluong=<?php echo $cart_item["id"]?>">+</a></p>
                            <p><?php echo $cart_item["soluong"]?></p>
                            <p class="main-1-left-cart-item-quantity-btn"><a href="./testcart.php?giamsoluong=<?php echo $cart_item["id"]?>">-</a></p>
                        </div>
                        <p class="main-1-left-cart-item-total-money"><?php echo number_format($tongtien)?></p>
                    </div>
                    <?php }?>
                    <?php } else{?>
                    <p style="text-align: center; font-size: 1.5rem; padding: 12px 0px; ">Giỏ hàng trống</p>
                    <?php }?>
                </div>
                <form action="" enctype="multipart/form-data" method="POST" >
                <div class="main-1-left-form">
                <div class="main-1left-form-item">
                            <p>Họ tên</p>
                            <input type="text" name="hoten" placeholder="Nhập họ tên">
                        </div>
                        <div class="main-1left-form-item">
                            <p>Địa chi nhận hàng</p>
                            <input type="text" name="diachi" placeholder="Nhập địa chỉ nhận hàng">
                        </div>
                        <div class="main-1left-form-item">
                            <p>Số điện thoại</p>
                            <input type="text" name="sdt" placeholder="Nhập số điện thoại">
                        </div>
                </div>
                <div class="main-1-left-all-btn">
                    <p><a href="./index.php"><i class="fas fa-long-arrow-alt-left"></i> Tiếp tục xem sản phẩm</a></p>
                    <button type="submit" name="capnhap">Cập nhập giỏ hàng</button>
                </div>
                </form>
            </div>
            <!-- làm phần bên phải main-1-right -->
            <div class="main-1-right">
                <h3 class="main-1-right-tittle">Tổng số lượng</h3>
                <div class="main-1-right-price-total-phu">
                    <p>Tổng phụ</p>
                    <p><?php echo number_format($thanhtoan)?>đ</p>
                </div>
                <div class="main-1-right-price-information">
                    <p>Giao hàng</p>
                    <div class="main-1-right-price-information-text">
                        <?php
                        if(isset($_POST["capnhap"]))
                        {
                            $_SESSION['tenkhachhang']=$_POST["hoten"];
                            $_SESSION['diachi']=$_POST["diachi"];
                            $_SESSION['sdt']=$_POST["sdt"];
                            $tenkhachhang=$_SESSION['tenkhachhang'];
                            $diachi=$_SESSION['diachi'];
                            $sdt=$_SESSION['sdt'];
                            echo "<p>Giao hàng miễn phí</p>";
                            echo "<p>$tenkhachhang</p>";
                            echo "<p>$diachi</p>";
                            echo "<p>$sdt</p>";
                        }
                        ?>
                    </div>
                </div>
                <div class="main-1-right-price-thanhtoan">
                    <p>Tổng</p>
                    <p><?php echo number_format($thanhtoan)?>đ</p>
                </div>
                <div class="main-1-right-btn-thanhtoan">
                   <?php if(isset($tenkhachhang)&&isset($diachi)&& isset($sdt) && isset($_SESSION["cart"])) {if(strlen($tenkhachhang)!=0 && strlen($diachi)!=0 && strlen($sdt)!=0){?>
                    <a href="./testcart.php?thanhtoan&phuongthuc=Tiền mặt">Tiến hành thanh toán (Tiền mặt)</a>
                    <form action="./vnpay_php/index.php" method="POST" style="width: 45%">
                        <button>Thanh toán vn pay (online)</button>
                    </form>
                    <?php } else{?>
                        <p>Mời nhập đầy đủ thông tin người nhận</p>
                        <?php } }?>
                </div>
            </div>
        </div>
    </div>
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
<!-- hết làm phần main  -->



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
                             <p><a href="./introduce.php" class="footer-active">Giới thiệu</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text ">
                             <p><a href="./product-boy.php">Đồng hồ nam</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./product-girl.php">Đồng hồ nữ</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./news.html" >Blogs</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./contact.php">Liên hệ</a></p>
                         </div>
                     </div>
 
                 </div>
             </div>
 
 
 
             <div class="footer-item footer-item-1">
                 <h2 class="footer-item-tittle">HỖ TRỢ</h2>
                 <div class="footer-item-list">
 
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.php">Hướng dẫn mua hàng</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.php">Hướng dẫn thanh toán</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.php">Chính sách bảo hành</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                       
                         <div class="footer-item-list-item-text">
                             <p><a href="./introduce.php">Chính sách đổi trả</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                     
                         <div class="footer-item-list-item-text">
                             <p><a href="./contact.php">Tư vấn khách hàng</a></p>
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