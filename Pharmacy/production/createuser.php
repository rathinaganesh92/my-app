<?php
require_once('header.php');
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$email=$_POST['email'];
	$type=$_POST['type'];

	$insertUserQuery = "INSERT INTO users(name, username, password, email,type) VALUES ('$name','$username','$password','$email','$type')";
	mysqli_query($conn,$insertUserQuery);

}


?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
          

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                 <h2>Create User</h2>
                   
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                     <div id="register" class="form ">
          <section class="login_content">
            <form action="" method="post">
               <div>
                <input type="text" class="form-control" name="name" placeholder="Full Name" required="" />
              </div>

              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password"  placeholder="Password" required="" />
              </div>
			  <div>
                <select name="type" class="form-control" required> 
				<option value="">Select User Type</option>
				<option value="1">Admin</option>
				<option vlaue="0">Regular User</option>
				</select>
              </div><br>
              <div>
             <!--   <a class="btn btn-default submit" href="index.html">Submit</a> -->
                  <input style="margin-left:0px !important" type="submit" class="btn btn-default submit" name="submit" value="Submit" />
              </div>

              <div class="clearfix"></div>

             
            </form>
          </section>
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