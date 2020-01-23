
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
                        $sql = mysqli_query($db,"SELECT DATEDIFF(NOW(),from_name) AS count , income , name, from_name ,id FROM tbl_sites ORDER BY count ASC");
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
                                    <button class="btn bg-cyan btn-xs waves-effect add_timeline" id="<?=$show['id'];?>" data-toggle="modal" data-target="#add_timeline">
                                        +
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
               
                    <div class="modal-header">
                        <h4 class="modal-title" id="timelineLabel">Timeline</h4>
                    </div>
                    <div class="modal-body" id="set_timeline">
                       
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-gray waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>                 
            </div>

            <!--  Modal addTimeline -->

            <div class="modal fade" id="add_timeline" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form action="" method="POST" id="updateForm">
                    <div class="modal-header">
                        <h4 class="modal-title" id="add_timelineLabel">add_timeline</h4>
                    </div>
                    
                    <div class="modal-body" id="addtimeline">
                    </div>                 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect" id="update">SAVE CHANGES</button>
                            <button type="button" class="btn btn-gray waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>                 
            </div>
<script>

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

$('.add_timeline').click(function(){
        var id = $(this).attr('id');
          
        $.ajax({
            url: './response/add_timeline.php',
            type: 'POST',
            data: {id:id},
            success:function(data){
                $('#addtimeline').html(data);
                
            }
        })
    })

    $('#update').click(function(){
        $.ajax({
            url : './response/update_timeline.php',
            type : 'POST',
            data: $("#updateForm").serialize(),
            success:function(data){
                console.log(data);
            }
        })
       
      

    })

    

</script>

            


