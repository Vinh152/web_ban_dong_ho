<?php
session_start();
include "./connect/connect.php";
// tăng số lượng
if(isset($_GET["themsoluong"]))
{
    $id=$_GET["themsoluong"];
    foreach($_SESSION["cart"] as $cart_item)
    {
        if($cart_item["id"]==$id)
        {
            $product[]=[
                "id"=>$cart_item["id"],
                        "ten"=>$cart_item["ten"],
                        "anh"=>$cart_item["anh"],
                        "soluong"=>$cart_item["soluong"]+1,
                        "gia"=>$cart_item["gia"],
            ];
        }
        else{
            $product[]=[
                "id"=>$cart_item["id"],
                        "ten"=>$cart_item["ten"],
                        "anh"=>$cart_item["anh"],
                        "soluong"=>$cart_item["soluong"],
                        "gia"=>$cart_item["gia"],
            ];
        }
    }
    $_SESSION["cart"]=$product;
    header("Location: ./cart.php");
}
// giảm số lương
if(isset($_GET["giamsoluong"]))
{
    $id=$_GET["giamsoluong"];
    foreach($_SESSION["cart"] as $cart_item)
    {
        if($cart_item["id"]==$id)
        {
            $soluong=$cart_item["soluong"]-1;
            if($soluong>0)
            {
                $product[]=[
                    "id"=>$cart_item["id"],
                            "ten"=>$cart_item["ten"],
                            "anh"=>$cart_item["anh"],
                            "soluong"=>$cart_item["soluong"]-1,
                            "gia"=>$cart_item["gia"],
                ];
            }
            else{
                $product[]=[
                    "id"=>$cart_item["id"],
                            "ten"=>$cart_item["ten"],
                            "anh"=>$cart_item["anh"],
                            "soluong"=>$cart_item["soluong"],
                            "gia"=>$cart_item["gia"],
                ];
            }
        }
        else{
            $product[]=[
                "id"=>$cart_item["id"],
                        "ten"=>$cart_item["ten"],
                        "anh"=>$cart_item["anh"],
                        "soluong"=>$cart_item["soluong"],
                        "gia"=>$cart_item["gia"],
            ];
        }
    }
    $_SESSION["cart"]=$product;
    header("Location: ./cart.php");
}
//xóa 1 sản phẩm
if(isset($_SESSION["cart"]) && isset($_GET["xoa"]))
{
    $id=$_GET["xoa"];
    foreach($_SESSION["cart"] as $cart_item)
    {
        if($cart_item["id"] != $id)
        {
            $product[]=[
                "id"=>$cart_item["id"],
                        "ten"=>$cart_item["ten"],
                        "anh"=>$cart_item["anh"],
                        "soluong"=>$cart_item["soluong"],
                        "gia"=>$cart_item["gia"],
            ];
        }
        $_SESSION["cart"]=$product;
        header("Location: ./cart.php");
}
}
//thêm sản phẩm và cả số lượng
if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $soluong=1;
    $sql="SELECT * FROM `sanpham` WHERE ID=$id";
    $query=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($query);
    if($row)
    {
        $new_product[]=[
            "id"=>$row["ID"],
            "ten"=>$row["tensanpham"],
            "anh"=>$row["anhgoc"],
            "soluong"=>$soluong,
            "gia"=>$row["giamoi"],
        ];
        if(isset($_SESSION["cart"]))
        {
            $found=false;
            foreach($_SESSION["cart"] as $cart_item)
            {
                if($cart_item["id"] == $id)
                {
                    $product[]=[
                        "id"=>$cart_item["id"],
                        "ten"=>$cart_item["ten"],
                        "anh"=>$cart_item["anh"],
                        "soluong"=>$cart_item["soluong"]+1,
                        "gia"=>$cart_item["gia"],
                    ];
                    $found=true;
                }
                //lưu lại thông tin cũ trong session
                else{
                    $product[]=[
                        "id"=>$cart_item["id"],
                        "ten"=>$cart_item["ten"],
                        "anh"=>$cart_item["anh"],
                        "soluong"=>$cart_item["soluong"],
                        "gia"=>$cart_item["gia"],
                    ];
                }
            }
            if($found==true)
            {
                $_SESSION["cart"]=$product;
            }
            else{
                $_SESSION["cart"]=array_merge($product, $new_product);
            }
        }
        else{
            $_SESSION["cart"]=$new_product;
        }
    }
    header("Location: ./cart.php");
}

if(isset($_GET["thanhtoan"]))
{
    $phuongthuc=$_GET["phuongthuc"];
    if($phuongthuc=="Tiền mặt")
    {
        $trangthai="Chưa thanh toán";
        $id=rand(1111,9999);
    }
    else{
        $trangthai="Đã thanh toán online";
        $id=$_SESSION["ID_giohang"];
    }
    $thanhtoan=0;
    foreach($_SESSION["cart"] as $cart_item)
    {
        $tongtien=$cart_item["gia"]*$cart_item["soluong"];
        $thanhtoan=$thanhtoan+$tongtien;
    }
    $tenkhachhang=$_SESSION["tenkhachhang"];
    $diachi=$_SESSION["diachi"];
    $sdt=$_SESSION["sdt"];
    $sql="INSERT INTO `giohang`(`ID`, `hoten`, `sdt`, `diachi`, `thoigiandat`, `tong`, `thanhtoan`, `phuongthuc`) VALUES ('$id','$tenkhachhang','$sdt','$diachi',now(),'$thanhtoan','$trangthai', '$phuongthuc')";
    $query=mysqli_query($conn, $sql);
    foreach($_SESSION["cart"] as $key=>$value)
    {
        $idsanpham=$value["id"];
        $tensanpham=$value["ten"];
        $anhsanpham=$value["anh"];
        $soluong=$value["soluong"];
        $gia=$value["gia"];
        $sql1="INSERT INTO `chitietdonhang`(`ID_giohang`, `ID_sanpham`, `tensanpham`, `anhgoc`, `gia`, `soluong`) VALUES ('$id','$idsanpham','$tensanpham','$anhsanpham','$gia','$soluong')";
        $query1=mysqli_query($conn, $sql1);
    };
    unset($_SESSION["cart"]);
    unset($_SESSION["ID_giohang"]);
    unset($_SESSION["tenkhachhang"]);
    unset($_SESSION["diachi"]);
    unset($_SESSION["sdt"]);
    header("Location: ./cart.php?thongbao=thanhcong");
}
else{
    header("Location: ./cart.php?thongbao=loi");
}
?>