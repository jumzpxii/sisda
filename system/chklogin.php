<?php

	session_start();
	include "connect.php";
	
	$username = mysqli_real_escape_string($db,$_POST['userlogin']);
	$password = mysqli_real_escape_string($db,$_POST['passlogin']);

	$strSQL = "SELECT * FROM tbl_member WHERE username = '$username'  AND password = '$password' ";
	$objQuery = mysqli_query($db,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult){
			echo "<meta http-equiv='refresh' 
                content='1;URL=../auth/login.php'>";
			   echo "<script>alert ('กรุณากรอกรหัสให้ถูกต้อง')</script>"; 			   
	}else{	
		
			$_SESSION[user] = $objResult["username"];
			$_SESSION[name] = $objResult["name"];
			$_SESSION[mid] = $objResult["mid"];
			$_SESSION[level] = $objResult["level"];
			// setcookie("user", $_POST['user'], time() + $lifetime, "/");
			// setcookie("pass", $_POST['pass'], time() + $lifetime, "/");


			session_write_close();
			?>
            
<script>
<?php
	if($_SESSION['level']=='0'){ ?>
		// alert ('ยินดีต้อนรับเข้าสู่ระบบค่ะ <?=$_SESSION['fullname']?>')
		window.location = "../";
	<?php }
	else if($_SESSION['level']=='1') { ?>
		alert ('คุณถูกระงับสิทธ์เข้าใช้งาน')
		window.location = "../login";		
	<?php }
	else{ ?>
		// alert ('ยินดีต้อนรับเข้าสู่ระบบค่ะ <?=$_SESSION['fullname']?>')
		window.location = "../";
	<?php } ?>
</script>
            
<?php } ?>