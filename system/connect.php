<?php 

//host

$serverName = "localhost";
$userName = "root";
$userPassword = "12345678";
$dbName = "solution";
  
	$db = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
	}
	else
	{
		// echo "Database Connected.";
	}
    date_default_timezone_set("Asia/Bangkok");

	// mysqli_close($conn);
?>

