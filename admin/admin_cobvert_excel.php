<?php
include "./connect/connect.php";
mysqli_query($conn,'SET NAMES "utf8"');
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=users.csv');
if(isset($_GET["chuyendoi"]))
{
    $output='';
    $thang=$_GET["thang"];
    $nam=$_GET["nam"];
    $sql="SELECT * FROM `giohang` WHERE MONTH(thoigiandat)=$thang and YEAR(thoigiandat)=$nam";
    $query=mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0)
    {
    //     $output.='
    //     <h1 style="width: 100%; text-align: center; margin-bottom: 30px; text-transform: uppercase; ">Thông tin doanh thu tháng</h1>
    //     <table style="width: 100%; border-collapse: collapse;">
    //   <tr>
    //       <th style="font-size: 20px; text-align: center; text-transform: uppercase; border: 1px solid black; padding: 5px;">ID</th>
    //       <th style="font-size: 20px; text-align: center; text-transform: uppercase; border: 1px solid black;  padding: 5px;">họ và tên</th>
    //       <th style="font-size: 20px; text-align: center; text-transform: uppercase; border: 1px solid black;  padding: 5px;">THời gian đặt</th>
    //       <th style="font-size: 20px; text-align: center; text-transform: uppercase; border: 1px solid black;  padding: 5px;">Tổng</th>
    //   </tr>
    //     ';
        while($row=mysqli_fetch_assoc($query))
        {
            // $output.='
            // <tr>
            // <td style="font-size: 16px; text-align: center; text-transform: uppercase; border: 1px solid black; padding: 10px;">'  .$row["ID"]. '</td>
            //     <td style="font-size: 16px; text-align: center; text-transform: uppercase; border: 1px solid black; padding: 10px;">'  .$row["hoten"]. '</td>
            //     <td style="font-size: 16px; text-align: center; text-transform: uppercase; border: 1px solid black; padding: 10px;">'  .$row["thoigiandat"]. '</td>
            //     <td style="font-size: 16px; text-align: center; text-transform: uppercase; border: 1px solid black; padding: 10px;">'  .$row["tong"]. '</td>
            // </tr>
            // ';
            $output .= $row['ID'].",".$row['hoten'].",".$row['thoigiandat'].",".$row['tong']."\n";
        }
        // $output.='
        // </table>'
        // ;
        // $output .= $row['ID'].",".$row['hoten'].",".$row['thoigiandat'].",".$row['tong']."\n";
        echo $output;
        exit;
    }
}
?>