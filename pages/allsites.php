          
          <div class="block-header"  style="margin-top:-50px;">
                <h2>
                   DATATABLES
                    <!-- <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="http://180.180.8.67/oss/searchonu" target="_blank" class="btn btn-info btn-xs waves-effect" style="margin:-10px 0px -10px 0px;">
                                <i class="material-icons">device_hub</i>
                                <span>OSS</span>
                            </a>
                            <a href="https://125.26.207.94:8443/cas" target="_blank" class="btn btn-warning btn-xs waves-effect" style="margin:-10px 0px -10px 0px;">
                                <i class="material-icons">device_hub</i>
                                <span>Ruckus CTL</span>
                            </a>
                            <ul class="header-dropdown">
                            <a href="?page=createnew" class="btn bg-green btn-sm waves-effect" style="margin:-10px;">เพิ่มข้อมูล</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="allsite" class="table table-sm table-bordered table-striped table-hover table-sm js-basic-example dataTable ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>วงจร</th>
                                            <th>สถานที่</th>                                         
                                            <th>ศูนย์บริการ</th>
                                            <th>หน่วยงาน</th>
                                            <th>วันที่ติดตั้ง</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i = 1;
                                        $sql = "SELECT * FROM tbl_sites WHERE stat = 0 ORDER BY YEAR(from_name) DESC, MONTH(from_name) DESC, DAY(from_name) DESC";
                                        $query = mysqli_query($db,$sql);
                                        while($show = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$show['jid']?></td>
                                            <td><?=$show['name']?></td>
                                            <td><?=$show['type']?></td>
                                            <td><?=$show['category']?></td>
                                            <td><?php echo DateThai($show['from_name'])?></td>
                                            <td>
                                                
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

