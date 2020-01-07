<?php
include "conn.php";
include "function.php";
if(!empty($_POST)){
    $mid = getCode("tbl_member","MID");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];      
        if($password != $repassword){
            echo "<script>alert ('กรุณากรอกข้อมูลให้ถูกต้อง');
            history.back();</script>";
        }
        $sql = mysql_query("INSERT INTO tbl_member (mid,username,password,fname,lname,level) VALUES ('$mid','$username','$password','$fname','$lname','0')");
        if($sql){
            echo "<script>
                alert('ลงทะเบียนเรียบร้อย');
                window.location='../login';
                </script>";
        }else{
            echo "<script>
                alert('ไม่สามารถบันทึกได้');
                history.back();
                </script>";
        }
            
    }   


?>