<?php 
include "../system/connect.php";

      if($_POST['department']){      
        $department = $_POST['department'];
        $sql = mysqli_query($db,"INSERT INTO department (name) VALUES ('$department')");
            if($sql){
                echo "บันทึกข้อมูลเรียบร้อยแล้ว";
            }else{
                echo "ไม่สามารถบันทึกข้อมูลได้";
            }
      }

      if($_POST['deldepartment']){
          $deldepartment = $_POST['deldepartment'];
          $del = mysqli_query($db,"DELETE FROM department WHERE id = '$deldepartment'");
            if($del){
                echo "ลบมูลเรียบร้อยแล้ว";
            }else{
                echo "ไม่สามารถลบข้อมูลได้";
            }
      }

      if($_POST['id']){
            $id = $_POST['id'];
            $update_department = $_POST['update_department'];
            $update = mysqli_query($db,"UPDATE department SET name = '$update_department' WHERE id = '$id'");
                if($update){
                    echo "แก้ไขข้อมูลแล้ว";
                }else{
                    echo "ไม่สามารถแก้ไขข้อมูลได้";
                }
      }
?>