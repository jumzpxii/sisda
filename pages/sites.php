          
          <div class="block-header"  style="margin-top:-50px;">
                <h2>
                   LDATATABLES
                    <!-- <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $_GET['service'];?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                        $sql = "SELECT * FROM tbl_sites WHERE service = '$_GET[service]'";
                                        $query = mysqli_query($db,$sql);
                                        while($show = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$show['jid']?></td>
                                            <td><?=$show['name']?></td>
                                            <td><?=$show['type']?></td>
                                            <td><?=$show['service']?></td>
                                            <td><?php echo DateThai($show['from_name'])?></td>
                                            <td></td>
                                            
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
            

