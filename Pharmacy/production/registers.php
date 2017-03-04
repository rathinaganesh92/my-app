<?php
require_once('header.php');
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];

	$insertpatientQuery = "INSERT INTO patients(name, mobile,address) VALUES ('$name','$mobile','$address')";
	mysqli_query($conn,$insertpatientQuery);

}


?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
          
             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              
                <div class="x_content">

				  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Register Patient</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate  class="form-horizontal form-label-left" method="post" action ="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" required="required" name="name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mobile" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="address"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <input type="submit"  class="btn btn-default submit"  name="submit" value="Submit">
						 </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
			
      
                </div>
              </div>
            </div>

           
          </div>

 </div>
        
        <!-- /page content -->

<?php
require_once('footer.php');
?>