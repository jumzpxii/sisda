<?php
	session_start();
	session_destroy();
// logout
if(isset($_POST['but_logout'])){
	session_destroy();
   
	// Remove cookie variables
	$days = 30;
	setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));
   
	header('Location: index.php');
   }
?>
<script type="text/javascript">
window.location="../login";
</script>