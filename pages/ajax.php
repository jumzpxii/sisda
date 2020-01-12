<div class="block-header"  style="margin-top:-50px;">
                <h2>
                    ศูนย์บริการลูกค้า
                    <!-- <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small> -->
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Email Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter your email address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password_2" class="form-control" placeholder="Enter your password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-primary m-t-15 waves-effect">เพิ่มข้อมูล</button>
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
                                <table id="contact_center" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>                                           
                                            <th>ศูนย์บริการ</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
<style>
th,td{
    text-align:center;
}
</style>    

<script>
$(document).ready(function() {
				var dataTable = $('#contact_center').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"./response/test.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".contact_center-error").html("");
							$("#contact_center").append('<tbody class="contact_center-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#contact_center_processing").css("display","none");
							
						}
					}
				} );
			} );
</script>

