<div class="block-header"  style="margin-top:-50px;">
                <h2>
                    ประเภทหน่วยงาน
                    <!-- <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="alert bg-red alert-dismissible" id="alert" role="alert" style="display:none"></div>
                    <div class="card">
                        <div class="body">
                            <form class="form-horizontal form_advanced_validation">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="department">หน่วยงาน</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="department" class="form-control" placeholder="ตัวอย่าง อปท. โรงเรียน. ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" id="adddepartment" class="btn btn-primary m-t-15 waves-effect">เพิ่มข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">#</th></th>
                                            <th style="width:60%">ประเภทหน่วยงาน</th>
                                            <th style="width:30%"></th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $i = 1;
                                    $sql = mysqli_query($db,"SELECT * FROM department ORDER BY id");
                                        while($show = mysqli_fetch_array($sql)){?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$show['name']?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning waves-effect edit_data" id="<?=$show['id'];?>" data-toggle="modal" data-target="#Edit_department">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                            <button type="button" id="<?=$show['id'];?>" class="btn btn-danger waves-effect deldepartment">
                                                <i class="material-icons">delete_sweep</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++ ;} ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!--  Modal Edite -->

            <div class="modal fade" id="Edit_department" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form action="" method="POST" id="updatedepartment">
                        <div class="modal-header">
                            <h4 class="modal-title" id="Edit_departmentLabel">แก้ไขข้อมูลหน่วยงาน</h4>
                        </div>
                        <div class="modal-body" id="update-department">
                          
                        </div>
                    </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect" id="update">SAVE CHANGES</button>
                            <button type="button" class="btn btn-gray waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
<style>
th,td{
    text-align:center;
}
</style>    

<script>
$(document).ready(function(){
    ///// ADd Data ///
    $('#adddepartment').click(function(){
        var department = $('#department').val();
        if(department == ''){ 
            $("#alert").css("display", "block");
            $("#alert").html('กรุณากรอกข้อมูลหน่วยงาน');
        }else{
            $.ajax({
                url:"./response/departmentdata.php",
                type:"POST",
                data:{department:department},
                success:function(data){
                    swal({
                        title: "สำเร็จ",
                        text: data,
                        icon: "success",
                        timer: 1000
                    }).then(function() {
                        window.location.reload();
                    });
                }
            }); 
        }       
    });

    ///// Delete Data ////
    $('.deldepartment').click(function(){
        var del = $(this).attr('id');
        swal({
            title: "Are you sure",
            text: "คุณต้องการลบข้อมูล ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url:"./response/departmentdata.php",
                type:"POST",
                data:{deldepartment:del},
                success:function(data){
                    swal({
                    title: data,
                    icon: "success",
                    timer: 1000
                    }).then(function() {
                            window.location.reload();
                    });
                }
            }); 
            
        }
    });
});

    ///// Edit Data ////
    $('.edit_data').click(function(){
    var edit_department = $(this).attr('id');
    $.ajax({
        url:"./response/edit_department.php",
        type:"POST",
        data:{edit_department:edit_department},
        success:function(data){
          $('#update-department').html(data);
          $('#Edit_department').modal('show');         
        }
      });
  });

  
    ///// Update Data ////
    $('#update').click(function(){
        var check = $("#updatedepartment").serialize();
        $.ajax({
            url:"./response/departmentdata.php",
            type:"POST",
            data: $("#updatedepartment").serialize(),
            success:function(data){
                swal({
                    title: data,
                    icon: "success",
                    timer: 1000
                    }).then(function() {
                        $('#Edit_department').modal('hide');
                            window.location.reload();
                });
            }
        });
  });

  
});
</script>

