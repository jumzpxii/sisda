<div class="block-header"  style="margin-top:-50px;">
                <h2>
                    ประเภทบริการ
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
                                        <label for="service">ประเภทบริการ</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="service" class="form-control" placeholder="บริการ....">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" id="addservice" class="btn btn-primary m-t-15 waves-effect">เพิ่มข้อมูล</button>
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
                                            <th style="width:60%">ประเภทบริการ</th>
                                            <th style="width:30%"></th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $i = 1;
                                    $sql = mysqli_query($db,"SELECT * FROM type_service ORDER BY id");
                                        while($show = mysqli_fetch_array($sql)){?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$show['service']?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning waves-effect edit_data" id="<?=$show['id'];?>" data-toggle="modal" data-target="#Edit_service">
                                                <i class="material-icons">mode_edit</i>
                                            </button>
                                            <button type="button" id="<?=$show['id'];?>" class="btn btn-danger waves-effect delservice">
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

            <div class="modal fade" id="Edit_service" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form action="" method="POST" id="updateservice">
                        <div class="modal-header">
                            <h4 class="modal-title" id="Edit_serviceLabel">แก้ไขข้อมูลศูนย์บริการ</h4>
                        </div>
                        <div class="modal-body" id="update-service">
                          
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
    $('#addservice').click(function(){
        var service = $('#service').val();
        if(service == ''){ 
            $("#alert").css("display", "block");
            $("#alert").html('กรุณากรอกข้อมูลศูนย์บริการ');
        }else{
            $.ajax({
                url:"./response/servicedata.php",
                type:"POST",
                data:{service:service},
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
    $('.delservice').click(function(){
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
                url:"./response/servicedata.php",
                type:"POST",
                data:{delservice:del},
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
    var edit_service = $(this).attr('id');
    $.ajax({
        url:"./response/edit_service.php",
        type:"POST",
        data:{edit_service:edit_service},
        success:function(data){
          $('#update-service').html(data);
          $('#Edit_service').modal('show');         
        }
      });
  });

  
    ///// Update Data ////
    $('#update').click(function(){
        var check = $("#updateservice").serialize();
        $.ajax({
            url:"./response/servicedata.php",
            type:"POST",
            data: $("#updateservice").serialize(),
            success:function(data){
                swal({
                    title: data,
                    icon: "success",
                    timer: 1000
                    }).then(function() {
                        $('#Edit_service').modal('hide');
                            window.location.reload();
                });
            }
        });
  });

  
});
</script>

