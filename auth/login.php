<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Sisda</b></a>
            <small>Manager Customer</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="userlogin" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="passlogin" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input class="btn btn-block bg-pink waves-effect" type="submit" value="SIGN IN" name="login">
                        </div>
                    </div>
                    <!-- <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-in.js"></script>
</body>

</html>
<?php
if(!empty($_POST['login'])){
	session_start();
	include "../system/connect.php";
	
	$username = mysqli_real_escape_string($db,$_POST['userlogin']);
	$password = mysqli_real_escape_string($db,$_POST['passlogin']);

	$strSQL = "SELECT * FROM tbl_member WHERE username = '$username'  AND password = '$password' ";
	$objQuery = mysqli_query($db,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult){
        echo '<div class="body">
        <div class="alert bg-red">
            กรุณากอกรหัสผ่านให้ถูกต้อง
        </div>
    </div>';
        	   
	}else{	
			
            $_SESSION[mid] = $objResult["mid"];
            $_SESSION[level] = $objResult["level"];
    
            
            if(!empty($_POST["rememberme"])) {
                setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                }
            }
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
            
<?php } }?>