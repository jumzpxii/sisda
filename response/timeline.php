<link href="./css/timeline.css" rel="stylesheet">
<?php 
include "../system/connect.php";
include "../system/function.php";
	
	if($_POST['name']!=''){
		$site = $_POST['name'];
			$sql = mysqli_query($db,"SELECT * FROM big_customer WHERE name = '$site'");
			$result = mysqli_fetch_array($sql);
	}
?>

<div class="container mt-5 mb-5 timeline_sw">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h4>Latest News</h4>
			<ul class="timeline">
			<?php 
				$sql2 = mysqli_query($db,"SELECT * FROM track_customer WHERE name = '$site' ORDER BY sdate DESC");
				while($show = mysqli_fetch_array($sql2)){
			?>
				<li>
					<a href="#" class="float-right"><?php echo DateThai($show['sdate']); ?></a>
					<p><?=$show['detail']?></p>
				</li>
				<?php } ?>
				<li>
					<a href="#" class="float-right"><?php echo DateThai($row['from_name']); ?></a>
					<p><?=$row['detail']?></p>
				</li>		
			</ul>
		</div>
	</div>
</div>