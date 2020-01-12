<?php 
include "../system/connect.php";

      if($_POST['service']){      
        $service = $_POST['service'];
        $sql = mysqli_query($db,"INSERT INTO type_service (service) VALUES ('$service')");
            if($sql){
                echo "บันทึกข้อมูลเรียบร้อยแล้ว";
            }else{
                echo "ไม่สามารถบันทึกข้อมูลได้";
            }
      }

      if($_POST['delservice']){
          $delservice = $_POST['delservice'];
          $del = mysqli_query($db,"DELETE FROM type_service WHERE id = '$delservice'");
            if($del){
                echo "ลบมูลเรียบร้อยแล้ว";
            }else{
                echo "ไม่สามารถลบข้อมูลได้";
            }
      }

      if($_POST['id']){
            $id = $_POST['id'];
            $update_service = $_POST['update_service'];
            $update = mysqli_query($db,"UPDATE type_service SET service = '$update_service' WHERE id = '$id'");
                if($update){
                    echo "แก้ไขข้อมูลแล้ว";
                }else{
                    echo "ไม่สามารถแก้ไขข้อมูลได้";
                }
      }
?>