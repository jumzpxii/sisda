<?php 
include "../system/connect.php";
    
    if($_POST['edit_service']){
        $service = $_POST['edit_service'];
        $sql = mysqli_query($db,"SELECT * FROM type_service WHERE id = '$service'");
        while($show = mysqli_fetch_array($sql)){
            $id = $show['id'];
            $service = $show['service'];          
        }
    }

?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert bg-red alert-dismissible" id="alert" role="alert" style="display:none"></div>               
                <div class="body">            
                    <input type="hidden" name="id" value="<?=$id;?>">            
                <label for="service" style="color:black">ประเภทบริการ</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="update_service" name="update_service" class="form-control" value="<?=$service;?>">
                        </div>
                    </div>                                                         
            </div>
        </div>
    </div>