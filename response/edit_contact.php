<?php 
include "../system/connect.php";
    
    if($_POST['edit_contact']){
        $contact = $_POST['edit_contact'];
        $sql = mysqli_query($db,"SELECT * FROM contact_center WHERE id = '$contact'");
        while($show = mysqli_fetch_array($sql)){
            $id = $show['id'];
            $contact = $show['name'];          
        }
    }

?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert bg-red alert-dismissible" id="alert" role="alert" style="display:none"></div>               
                <div class="body">            
                    <input type="hidden" name="id" value="<?=$id;?>">            
                <label for="contact" style="color:black">ศูนย์บริการ</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="update_contact" name="update_contact" class="form-control" value="<?=$contact;?>">
                        </div>
                    </div>                                                         
            </div>
        </div>
    </div>