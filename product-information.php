<?php
require_once "./connect/connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
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
    <link rel="stylesheet" href="./CSS/product-information.css">
</head>
<body>
<?php include "./header.php"; ?>
<!-- hết phần header  -->

<!-- làm phần main  -->

<div class="main">
    <div class="container">
        <!-- làm phần main thứ nhất  -->
        <?php 
    if(isset($_GET["id"]))
    {
        
        $id=$_GET["id"];
        $_SESSION["id_sanpham"]=$id;
        $sql="select * from sanpham where ID=$id";
        $query=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($query);
    ?>
        <div class="main-1">
            <div class="main-1-left">
                <div class="main-1-left-img">
                    <img src="./sanpham/<?php echo $row["anhgoc"]?>" alt="">
                    <p class="main-1-left-img-heart"><i class="fas fa-heart"></i></p>
                </div>

                <div class="main-1-left-choose">
                  <div class="main-1-left-choose-item">
                      <img class="main-1-left-choose-item-img" src="./sanpham/<?php echo $row["anh1"]?>" alt="">
                  </div>

                  <div class="main-1-left-choose-item">
                    <img class="main-1-left-choose-item-img" src="./sanpham/<?php echo $row["anh2"]?>" alt="">
                </div>


                <div class="main-1-left-choose-item">
                    <img class="main-1-left-choose-item-img" src="./sanpham/<?php echo $row["anh3"]?>" alt="">
                </div>

                <div class="main-1-left-choose-item">
                    <img class="main-1-left-choose-item-img" src="./sanpham/<?php echo $row["anh4"]?>" alt="">
                </div>
                </div>

            </div>



            <div class="main-1-right">
                <h1 class="main-1-right-name"><?php echo $row["tensanpham"]?></h1>
                <div class="main-1-right-price">
                    <p class="main-1-right-price-text"> <del><?php echo number_format( $row["giacu"])?>đ</del>  <?php echo number_format($row["giamoi"])?>đ</p>
                </div>

                <div class="main-1-right-introduce">
                    <p><?php echo $row["mota"]?></p>
                </div>

                <ul class="main-1-right-ingredient">
                    <?php
                    if($row["soluong"]>0)
                    {
                    ?>
                    <li><p>Sku: <span>Còn hàng</span></p></li>
                    <?php } else {?>
                        <li><p>Sku: <span>Hết hàng</span></p></li>
                    <?php }?>
                </ul>


                <div class="main-1-right-number-buy">
                    <div class="main-1-right-number">
                        <button class="main-1-right-number-minus"><i class="fas fa-minus"></i></button>
                        <p class="main-1-right-number-text">1</p>
                        <button class="main-1-right-number-plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="main-1-right-buy">
                        <?php 
                        if($row["soluong"]>0)
                        { 
                        ?>
                        <a href="./testcart.php?id=<?php echo $row["ID"]?>" class="main-1-right-buy-btn">Thêm vào giỏ</a>
                        <?php } else{?>
                        <p class="main-1-right-buy-btn">Sản phẩm hiện hết hàng</p>
                        <?php }?>
                    </div>
                </div>


                <div class="main-1-right-tittle-choose-pay">
                    <h3 class="main-1-right-tittle-choose-pay-item">Tính phí tự động</h3>
                    <h3 class="main-1-right-tittle-choose-pay-item">Thanh toán</h3>
                </div>

                <div class="main-1-right-type-pay">
                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/Agribank-logo.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/CBbank-logo.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-BIDV.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-MB-new2020.gif" alt=""></a>
                    </div>


                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-Sacombank.png" alt=""></a>
                    </div>


                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-Techcombank.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-Vietcombank.png" alt=""></a>
                    </div>


                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-Vietinbank.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/logo-ngan-hang-VPbank.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/Oceanbank-logo.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/TPbank-logo.png" alt=""></a>
                    </div>

                    <div class="main-1-right-type-pay-item">
                        <a href=""><img src="./banking/VIB-bank-logo.png" alt=""></a>
                    </div>
                </div>



                <div class="main-1-right-list-last">
                    <ul class="main-1-right-list-last-s">
                        <?php
                        if(isset($_SESSION['login']))
                        {
                        ?>
                        <li class="main-1-right-list-last-item"><a href="">Thêm yêu thích</a></li>
                        <?php }?>
                        <li class="main-1-right-list-last-item"><span>Mã: <?php echo $row["ID"]?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } else{
            ?>
        <h2>Lỗi lấy thông tin sản phẩm</h2>
        <?php }?>
        <!-- hết phần main-1 -->



        <!-- sang làm phần main thứ 2 -->
        <div class="main-2">
            <div class="main-2-tittle">
                <h3 class="main-2-tittle-item main-2-tittle-item-split main-2-tittle-item-mota">Mô tả</h3>
                <h3 class="main-2-tittle-item main-2-tittle-item-danhgia">Đánh giá (<span class="main-2-tittle-item-number">

                <?php
                $sql3="SELECT COUNT(ID) as 'soluong' FROM `review` WHERE ID=$id";
                $query3=mysqli_query($conn, $sql3);
                $row3=mysqli_fetch_assoc($query3);
                echo $row3["soluong"];
                ?>
                </span>)</h3>
            </div>
            <div class="main-2-frame main-2-frame-mota">
                <p class="main-2-mota-text">
                    <?php echo $row["mota"]?>
                </p>
            </div>

            <div class="main-2-frame main-2-frame-danhgia">
                <div class="main-2-frame-danhgia-text">
                    <h3 class="main-2-frame-danhgia-text-tittle">
                        Đánh giá
                    </h3>
                    <?php
                    if($row3["soluong"]==0)
                    {
                    ?>
                    <p class="main-2-frame-danhgia-text-text">
                        Chưa có đánh giá nào. 
                    </p>
                    <?php } else { 
                        $sql4="SELECT * FROM `review` WHERE ID=$id";
                        $query4=mysqli_query($conn, $sql4);
                        $i=0;
                        while($row4=mysqli_fetch_assoc($query4))
                        {
                        ?>
                    
                   <p class="main-2-frame-danhgia-text-text">
                       <p class="main-2-frame-danhgia-text-text">Người đánh giá: <?php echo $row4["hoten"]?></p>
                        <p class="main-2-frame-danhgia-text-text" style="font-size: 12px;"><?php echo $row4["nhanxet"]?>: <span style="color: red; margin-left: 10px;">Number star: <?php echo $row4["star"]?></span></p> 
                    </p>
                        <?php $i++;
                    if($i>5)
                    {
                        break;
                    }
                    } }?>
                </div>
                <!-- làm phần mục đánh giá để điền  -->
                <form class="main-2-frame-danhgia-frame" method="POST" action="./review_sanpham.php">
                    <h3 class="main-2-frame-danhgia-tittle">
                        Hãy là người đầu tiên nhận xét “Classico 4” 
                    </h3>
                    <div class="main-2-frame-danhgia-star">
                        <h4 class="main-2-frame-danhgia-star-tittle">
                            Đánh giá của bạn
                        </h4>

                        <div class="main-2-frame-danhgia-star-choose">
                            <select name="sao" id="">
                                <option value="1">1 star</option>
                                <option value="2">2 star</option>
                                <option value="3">3 star</option>
                                <option value="4">4 star</option>
                                <option value="5">5 star</option>
                            </select>
                        </div>
                    </div>


                    <div class="main-2-frame-danhgia-input-text">
                        <h4 class="main-2-frame-danhgia-star-tittle">
                            Nhận xét của bạn *
                        </h4>

                        <textarea name="comment" placeholder="Nhập lời nhận xét"></textarea>
                    </div>
                    <input type="submit" class="main-2-frame-danhgia-btn-submit" value="Gửi đi" name="nhanxet">
                </form>
                <!-- hết làm phần mục đánh giá để điền  -->
            </div>
        </div>
        <!-- hết làm phần main thứ 2 -->




        <!-- sang làm phần main thứ 3 -->
<div class="main-3">
    <h1 class="main-3-tittle">
        Sản phẩm tương tự
    </h1>
    <div class="main-3-s">

    <?php
    $sql="select * from sanpham";
    $sql1="select count(ID) as 'soluong' from sanpham";
    $query=mysqli_query($conn, $sql);
    $query1=mysqli_query($conn, $sql1);
    $i=0;
    $soluong=mysqli_fetch_assoc($query1);
    while($row2=mysqli_fetch_assoc($query))
    {
        if($i<5)
        {
?>
        <div class="main-3-item">
            <div class="main-3-item-image">
                <a href="./product-information.php?id=<?php echo $row2["ID"]?>"><img class="main-3-item-image-1" src="./sanpham/<?php echo $row2["anhgoc"]?>" alt=""></a>
                <div class="main-3-item-image-heart">
                    <a href=""><i class="fas fa-heart"></i></a>
                </div>
            </div>
            <div class="main-3-item-text">
                <h3 class="main-3-item-tittle"><?php echo $row2["tensanpham"]?></h3>
                <p class="main-3-item-price"><?php echo number_format($row2["giamoi"])?>đ</p>
                <p class="main-3-item-btn"><a href="">Thêm vào giỏ</a></p>
            </div>
        </div>
    <?php 
}
$i++;}?>
    </div>



</div>

        <!-- hết phần main thứ 3  -->
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

    // làm phần chuyển sản phẩm khi chọn ảnh 
    $(document).ready(function(){
        $(".main-1-left-choose-item-img").click(function(){
            $(".main-1-left-img img").attr("src", $(this).attr("src"));
        });


        // làm phần hiển thị đánh giá và mô tả 
        $(".main-2-tittle-item-mota").click(function(){
            $(".main-2-frame-danhgia").hide(1000);
            $(".main-2-frame-mota").show(1000);
        });
        $(".main-2-tittle-item-danhgia").click(function(){
            $(".main-2-frame-mota").hide(1000);
            $(".main-2-frame-danhgia").show(1000);
        });
    });
</script>
</body>
</html>