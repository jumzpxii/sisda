<link href="./plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="./plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<?php 
include "../system/connect.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = mysqli_query($db,"SELECT * FROM big_customer WHERE id = '$id'");
    $fetch = mysqli_fetch_array($sql);
}
?>
    <h4 style="margin-top:-20px; color:black;"><?=$fetch['name']?></h4>

<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-xs-9">
        <label class="card-inside-title">เพิ่มข้อมูล</label>
        <div class="input-group date" id="bs_datepicker">
            <div class="form-line">
                <input type="text" class="form-control" name="sdate" placeholder="Please choose a date...">
            </div>
            <span class="input-group-addon">
                <i class="material-icons">date_range</i>
            </span>
        </div> 
        <input type="hidden" name="site" value="<?=$fetch['name']?>">                                     
    </div> 
</div>
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-xs-9">
        <label for="detail">รายละเอียด</label>
        <div class="form-group">
            <div class="form-line">
                <textarea rows="2" class="form-control" name="detail" placeholder="Please type what you want..."></textarea>
            </div>
        </div>
    </div>                                                                  
</div>

<script>
$('#bs_datepicker').datepicker({
    format: 'dd/mm/yyyy'
});

</script>