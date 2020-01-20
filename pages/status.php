<link href="./plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="./plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<div class="block-header"  style="margin-top:-50px;">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>สถานที่</th>
                                <th>สถานะ</th>
                                <th>วันที่ Plan</th>                                         
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php 
                        $sql = mysqli_query($db,"SELECT DATEDIFF(NOW(),from_name) AS count , income , name, from_name FROM tbl_sites ORDER BY count ASC");
                        $i = 1;
                        while($show = mysqli_fetch_Array($sql)){
                            $name = $show['name'];
                            if($show['count']>90){
                                $status = '<span class="badge bg-red">'.$show["count"].'</span>';
                            }else if($show['count']<90){
                                $status = '<span class="badge bg-yellow">'.$show["count"].'</span>';
                            }else if($show['count']>30){
                                $status = '<span class="badge bg-green">'.$show["count"].'</span>';
                            }

                        ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$name;?></td>
                                <td><?=$status;?></td>
                                <td><?php echo DateThai($show['from_name'])?></td>
                                <td>                                   
                                    <button class="btn bg-purple btn-xs waves-effect modal_name" id="<?=$name;?>" data-toggle="modal" data-target="#timeline">
                                        <i class="material-icons">timeline</i>
                                    </button>
                                    <button class="btn bg-pink btn-xs waves-effect" id="showtimeline">
                                        <i class="material-icons">code</i>
                                    </button>
                                </td>                                           
                            </tr>
                        <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->
            <!--  Modal Timeline -->

            <div class="modal fade" id="timeline" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="collapse" id="collapseExample">
                        <form action="" method="POST" id="update_timeline">
                            <div class="container" style="padding:20px 0px 0px 20px;">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <h2 class="card-inside-title">เพิ่มข้อมูล</h2>
                                        <div class="input-group date" id="bs_datepicker">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="sdate" placeholder="Please choose a date...">
                                            </div>
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        </div> 
                                        <input type="hidden" name="site" value="<?=$name;?>">                                     
                                    </div> 
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label for="detail">รายละเอียด</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="2" class="form-control" name="detail" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                    </div>                                                                  
                                </div> 
                            </div>
                        </form>
                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title" id="timelineLabel">Timeline</h4>
                    </div>
                    <div class="modal-body" id="set_timeline">
                       
                    </div>
                        <div class="modal-footer">
                            <button class="btn bg-cyan waves-effect" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                เพิ่ม Timeline
                            </button>
                            <button type="button" class="btn btn-primary waves-effect" id="update">SAVE CHANGES</button>
                            <button type="button" class="btn btn-gray waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>                 
            </div>
<script>
$('#bs_datepicker').datepicker({
    format: 'dd/mm/yyyy'
});

$('.modal_name').click(function(){
    var name = $(this).attr('id');
    $.ajax({
        url: './response/timeline.php',
        type: 'POST',
        data: {name:name},
        success:function(data){
            $('#set_timeline').html(data);
            // $('#timeline').modal('show');
        }
    })
})    
    $('#update').click(function(){
        var check = $("#update_timeline").serialize();
        console.log(check)

    })

</script>

            


