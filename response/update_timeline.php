<?php 
include "../system/connect.php";

if($_POST['site']!=''){
    $site = $_POST['site'];
    $sdate = date("Y-d-m",strtotime($_POST['sdate']));
    $detail = $_POST['detail'];

    echo $sdate;
    $sql = mysqli_query($db,"INSERT INTO track_customer (name,detail,sdate) VALUES ('$site','$detail','$sdate')");

    if($sql){
        echo 'อัปเดตสำเร็จ';
    }else{
        echo 'อัปเดตไม่สำเร็จ';
    }
}

?>