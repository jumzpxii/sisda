<?php
include "conn.php";
    $username       = $_POST["username"];
	$oldpassword 	= $_POST["oldpassword"];
	$password 		= $_POST["password"];
	$repassword 	= $_POST["repassword"];
	

	$sql = "SELECT username FROM tbl_member WHERE username='$username' and password='$oldpassword'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	
	if ($num==0)
		die("<script>
				alert('ข้อมูลไม่ถูกต้อง');
				history.back();
			 </script>");

	// 2.2 password = repassword
	if ($password != $repassword)
		die("<script>
				alert('รหัสผ่านไม่ตรงกัน');
				history.back();
			 </script>");

// 6. save data
	// $password = md5($password);

	$sql = "UPDATE tbl_member SET password='$password' WHERE username='$username'";
	$result = mysql_query($sql) or die("Err : $sql");
	
	echo "<script>
			alert('อัพเดตเรียบร้อย');
			window.location='../login';
		  </script>";

?>