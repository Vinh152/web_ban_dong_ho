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
    <title>Đồng hồ nam</title>
    <!-- link phông chữ  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/product.css">
    <!-- link của icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- thư viện slick slider  -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- thư viện animation AOS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.0.2/aos.css">
   <!-- thư viện animation WOW -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <link rel="stylesheet" href="./CSS/product-boy.css">
</head>
</head>
<body>
<?php include "./header.php"; ?>
<!-- hết phần header  -->

<!-- làm phần main -->
<div class="main">
    <div class="container">
        <div class="main-tittle">
            <div class="main-tittle-left">
                <h3 class="main-tittle-left-text">Trang chủ <span>/</span> <span class="main-tittle-left-text-active">Đồng hồ </span></h3>
            </div>
            <div class="main-tittle-right">
                <div class="main-tittle-right-text-responsive">
                    <label for="main-middle-left-toggle" class="main-tittle-right-text-responsive-lable-bar"><i class="fas fa-bars"></i></label>
                    <h2>Lọc</h2>
                </div>
                <h3 class="main-tittle-right-text">Hiên thị một kết quả duy nhất</h3>
                <select name="" id="main-tittle-right-choose">
                    <option value="0">Thứ tự mặc định</option>
                    <option value="0">Thứ tự theo mức độ phổ biến</option>
                    <option value="0">Thứ tự theo điểm đánh giá</option>
                    <option value="0">Mới nhất</option>
                    <option value="0">Thứ tự theo giá: thấp đến cao</option>
                    <option value="0">Thứ tự theo giá: cao đến thấp</option>
                </select>
            </div>
        </div>




        <!-- làm phần main chính -->
        <div class="main-middle">
            <!-- chỗ input phần làm trung gian của main-middle-left -->
            <input type="checkbox" id="main-middle-left-toggle">
            <!-- main-middle-modal là phần để phụ trợ cho main-middle-left khi responsive -->
            <div class="main-middle-modal"></div>
            <!-- phần làm dấu chữ X khi mà main-middle-left hiện ra ở phần responsive -->
            <label for="main-middle-left-toggle" class="main-tittle-right-text-responsive-lable-exit"><i class="fas fa-times"></i></label>
             <!-- hết phần làm dấu chữ X khi mà main-middle-left hiện ra ở phần responsive -->
            <div class="main-middle-left">

                <!-- làm phần main middle left  1 -->
                <div class="main-middle-left-item">
                    <h4 class="main-middle-left-item-tittle">
                        DANH MỤC SẢN PHẨM
                    </h4>

                    <nav class="main-middle-left-item-list">
                        <ul>
                           <li><a href="./product.php?loai=dong ho co">Đồng hồ cơ</a></li> 
                           <li><a href="./product.php?loai=dong ho thong minh">Đồng hồ thông minh</a></li> 
                           <li class="main-middle-left-item-list-item-active"><a href="">Sản phẩm</a> <span><i class="fas fa-chevron-down"></i></span></li>
                           <div class="main-middle-left-item-list-dropmenu">
                            
                               <ul>
                               <?php
                            $sql_hang="SELECT * FROM `hang`";
                            $query_hang=mysqli_query($conn, $sql_hang);
                            while($data_hang=mysqli_fetch_assoc($query_hang))
                            {
                            ?>
                                   <li><a href="./product.php?loai=<?php echo $data_hang['ID_hang']?>"><?php echo $data_hang['tenhang']?></a></li>
                            <?php }?>
                               </ul>
                           </div> 
                        </ul>
                    </nav>
                </div>

<!-- làm phần main middle left  2 -->
                <div class="main-middle-left-item">
                    <h4 class="main-middle-left-item-tittle">
                        SẢN PHẨM
                    </h4>

                    <div class="main-middle-left-item-list">
                    <?php
         $sql="select * from sanpham";
         $query=mysqli_query($conn, $sql);
         $i=0;
         while($row=mysqli_fetch_assoc($query))
         {
             if($i<5)
             {
         ?>
                        <div class="main-middle-left-item-list-item">
                            <div class="main-middle-left-item-list-item-logo">
                                <a href="./product-information.php?id=<?php echo $row["ID"]?>"><img src="./sanpham/<?php echo $row["anhgoc"]?>" alt=""></a>
                            </div>
                            <div class="main-middle-left-item-list-item-text">
                                <h3 class="main-middle-left-item-list-item-text-tittle">
                                <?php echo $row["tensanpham"];?>
                                </h3>
                                <p class="main-middle-left-item-list-item-text-price">
                                <?php echo number_format($row["giamoi"]);?>
                                </p>
                            </div>
                        </div>
        <?php } $i++;}?>
                    </div>
                </div>
<!-- làm phần main middle left  3 -->
                <div class="main-middle-left-item">
                    <h4 class="main-middle-left-item-tittle">
                        SẢN PHẨM
                    </h4>

                    <div class="main-middle-left-item-list">
                        <div class="main-middle-left-item-list-item">
                            <div class="main-middle-left-item-list-item-logo main-middle-left-item-list-item-logo-new">
                                <a href="./new-information1.html"><img class="main-middle-left-item-list-item-logo-new" src="./new/new-1.jpg" alt=""></a>
                            </div>
                            <div class="main-middle-left-item-list-item-text">
                                <h3 class="main-middle-left-item-list-item-text-tittle main-middle-left-item-list-item-text-tittle-new">
                                    <a href="./new-information1.html">Chiếc đồng hồ của những CEO quyền lực nhất thế giới</a>
                                </h3>
                            </div>
                        </div>


                        <div class="main-middle-left-item-list-item">
                            <div class="main-middle-left-item-list-item-logo main-middle-left-item-list-item-logo-new">
                                <a href="./new-information2.html"><img class="main-middle-left-item-list-item-logo-new" src="./new/new-2.jpg" alt=""></a>
                            </div>
                            <div class="main-middle-left-item-list-item-text">
                                <h3 class="main-middle-left-item-list-item-text-tittle main-middle-left-item-list-item-text-tittle-new">
                                    <a href="./new-information2.html">12 chiếc đồng hồ dành cho nữ giới đắt giá nhất mọi thời đại</a>
                                </h3>

                            </div>
                        </div>



                        <div class="main-middle-left-item-list-item">
                            <div class="main-middle-left-item-list-item-logo main-middle-left-item-list-item-logo-new">
                                <a href="./new-information3.html"><img class="main-middle-left-item-list-item-logo-new" src="./new/new-3.jpg" alt=""></a>
                            </div>
                            <div class="main-middle-left-item-list-item-text">
                                <h3 class="main-middle-left-item-list-item-text-tittle main-middle-left-item-list-item-text-tittle-new">
                                    <a href="./new-information3.html">10 thương hiệu đồng hồ cao cấp hàng đầu mọi quý ông đều quan tâm, Rolex xếp hạng số 3</a>
                                </h3>

                            </div>
                        </div>




                        <div class="main-middle-left-item-list-item">
                            <div class="main-middle-left-item-list-item-logo main-middle-left-item-list-item-logo-new">
                                <a href="./new-information4.html"><img class="main-middle-left-item-list-item-logo-new" src="./new/new-4.jpg" alt=""></a>
                            </div>
                            <div class="main-middle-left-item-list-item-text">
                                <h3 class="main-middle-left-item-list-item-text-tittle main-middle-left-item-list-item-text-tittle-new">
                                    <a href="./new-information4.html">6 chiếc đồng hồ ấn tượng tại Oscar 2019: Từ những thương hiệu đình đám với cái giá “cắt cổ”</a>
                                </h3>

                            </div>
                        </div>




                        <div class="main-middle-left-item-list-item">
                            <div class="main-middle-left-item-list-item-logo main-middle-left-item-list-item-logo-new">
                                <a href="./new-information5.html"><img class="main-middle-left-item-list-item-logo-new" src="./new/new-5.jpg" alt=""></a>
                            </div>
                            <div class="main-middle-left-item-list-item-text">
                                <h3 class="main-middle-left-item-list-item-text-tittle main-middle-left-item-list-item-text-tittle-new">
                                   <a href="./new-information5.html"> Casio sẽ ra mắt đồng hồ thông minh thương hiệu G-Shock để cạnh tranh với Apple Watch?</a>
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="main-middle-right">
                <div class="row1">
                    <?php 
                    if(isset($_GET["loai"]))
                    {
                        $loai=$_GET["loai"];
                        // echo $loai;
                        if($loai!="dong ho co" && $loai!="dong ho thong minh")
                        {
                            $sql="select * from sanpham where ID_hang= '$loai'";
                        }
                        else if($loai=="dong ho co" || $loai=="dong ho thong minh")
                        {
                            if($loai=="dong ho co")
                            {
                                $sql="select * from sanpham where theloai='dong ho co'";
                                
                            }
                            else{
                                $sql="select * from sanpham where theloai='dong ho thong minh'";
                            }
                        }

                        $query=mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_assoc($query))
                        {
                    ?>
                     <div class="main-middle-right-item">
                        <div class="main-middle-right-item-img">
                            <a href="./product-information.php?id=<?php echo $row["ID"]?>"><img src="./sanpham/<?php echo $row["anhgoc"]?>" alt=""></a>
                            <div class="main-middle-right-item-img-overlay">
                                <a href="./product-information.php?id=<?php echo $row["ID"]?>"><img src="./sanpham/<?php echo $row["anh2"]?>" alt=""></a>
                            </div>
                        </div>

                        <div class="main-middle-right-item-text">
                            <h3 class="main-middle-right-item-text-tittle"><?php echo $row["tensanpham"]?></h3>
                            <p class="main-middle-right-item-text-price"><?php echo number_format($row["giamoi"])?>đ</p>
                            <a href="./testcart.php?id=<?php echo $row["ID"]?>" class="main-middle-right-item-text-btn-buy">Thêm vào giỏ</a>
                        </div>
                    </div>
                    <?php }} else {?>
                        <p>Lỗi lấy sản phẩm</p>
<?php }?>
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
</div>
<!-- hết làm phần main -->









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
                             <p><a href="./product-boy.html" class="footer-active">Đồng hồ nam</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                         
                         <div class="footer-item-list-item-text">
                             <p><a href="./product-girl.html">Đồng hồ nữ</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./news.html">Blogs</a></p>
                         </div>
                     </div>
 
                     <div class="footer-item-list-item">
                        
                         <div class="footer-item-list-item-text">
                             <p><a href="./contact.html">Liên hệ</a></p>
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
<script>
    $(document).ready(function(){
        $(".main-middle-left-item-list-item-active").click(function(){
            $(".main-middle-left-item-list-dropmenu").slideToggle(500);
        });
    });
</script>


</body>
</html>