<link href="./plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<link href="./plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<!-- Example Tab -->
<div class="row" style="margin-top:-50px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card"> 
            <div class="header">
                <h2>
                    เพิ่มข้อมูล
                </h2>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#technical" data-toggle="tab">Technical</a></li>
                    <li role="presentation"><a href="#marketing" data-toggle="tab">Marketing</a></li>
                </ul>
                <form id="form_validation" method="POST">

                <!-- Tab panes -->
                <div class="tab-content"> 
                    <div role="tabpanel" class="tab-pane fade in active" id="technical"><br>
                        <div class="row clearfix">
                                <div class="col-sm-3">
                                <label for="jid">วงจร</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="3837j0001" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                <label for="domain">โดเมน</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="@domain" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                <label for="name">ชื่อสถานที่</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="สถานที่" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                <label for="domain">ศูนย์บริการ</label>                               
                                    <select class="form-control" name="contact" id="contact" required/>
                                        <option value="">-- เลือกสาขา --</option>
                                        <?php 
                                            $sql = mysqli_query($db,"SELECT * FROM contact_center");
                                            while($show = mysqli_fetch_array($sql)){
                                        ?>
                                            <option value="<?=$show['name']?>"><?=$show['name']?></option>
                                        <?php } ?>
                                    </select>
                                                                          
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                <label for="domain">ประเภทบริการ</label>                               
                                    <select class="form-control" name="service" id="service" required/>
                                        <option value="">-- เลือกบริการ --</option>
                                        <?php 
                                            $sql = mysqli_query($db,"SELECT * FROM type_service");
                                            while($show = mysqli_fetch_array($sql)){
                                        ?>
                                            <option value="<?=$show['service']?>"><?=$show['service']?></option>
                                        <?php } ?>
                                    </select>                                                                        
                                </div>
                                <div class="col-sm-3">
                                <label for="domain">หน่วยงาน</label>                               
                                    <select class="form-control" name="department" id="department" required/>
                                        <option value="">-- เลือกหน่วยงาน --</option>
                                        <?php 
                                            $sql = mysqli_query($db,"SELECT * FROM department");
                                            while($show = mysqli_fetch_array($sql)){
                                        ?>
                                            <option value="<?=$show['name']?>"><?=$show['name']?></option>
                                        <?php } ?>
                                    </select>                                                                        
                                </div>
                            </div>
                                
                            
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="marketing">
                        <b>Profile Content</b>
                        <p>
                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                            sadipscing mel.
                        </p>
                    </div>
                    <hr>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- #END# Example Tab -->

<!-- Bootstrap Datepicker Plugin Js -->
<script src="./plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

