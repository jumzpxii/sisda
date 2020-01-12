<?php 
include "../system/connect.php";
    
    if($_POST['edit_department']){
        $department = $_POST['edit_department'];
        $sql = mysqli_query($db,"SELECT * FROM department WHERE id = '$department'");
        while($show = mysqli_fetch_array($sql)){
            $id = $show['id'];
            $department = $show['name'];          
        }
    }

?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert bg-red alert-dismissible" id="alert" role="alert" style="display:none"></div>               
                <div class="body">            
                    <input type="hidden" name="id" value="<?=$id;?>">            
                <label for="department" style="color:black">ประเภทหน่วยงาน</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="update_department" name="update_department" class="form-control" value="<?=$department;?>">
                        </div>
                    </div>                                                         
            </div>
        </div>
    </div>