<?php 
include "../system/connect.php";

      if($_POST['contact']){      
        $contact = $_POST['contact'];
        $sql = mysqli_query($db,"INSERT INTO contact_center (name) VALUES ('$contact')");
            if($sql){
                echo "บันทึกข้อมูลเรียบร้อยแล้ว";
            }else{
                echo "ไม่สามารถบันทึกข้อมูลได้";
            }
      }

      if($_POST['delcontact']){
          $delcontact = $_POST['delcontact'];
          $del = mysqli_query($db,"DELETE FROM contact_center WHERE id = '$delcontact'");
            if($del){
                echo "ลบมูลเรียบร้อยแล้ว";
            }else{
                echo "ไม่สามารถลบข้อมูลได้";
            }
      }

      if($_POST['id']){
            $id = $_POST['id'];
            $update_contact = $_POST['update_contact'];
            $update = mysqli_query($db,"UPDATE contact_center SET name = '$update_contact' WHERE id = '$id'");
                if($update){
                    echo "แก้ไขข้อมูลแล้ว";
                }else{
                    echo "ไม่สามารถแก้ไขข้อมูลได้";
                }
      }
?>