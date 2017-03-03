<?php
require_once('header.php');

if(isset($_POST['submit'])){

  $medicine=$_POST['medicine'];
  $status=$_POST['status'];
  $description=$_POST['description'];
  $category=$_POST['category'];
  $quantity=$_POST['quantity'];
  $manufacture=$_POST['manufacture'];
  $packing=$_POST['packing'];
  $expiry=$_POST['expiry'];
  $amount=$_POST['amount'];
  $insertMedicineQuery="INSERT INTO medicine( name, description, status, expiry_date, amount, category, quantity, manufacturer, packing) VALUES ('$medicine','$description','$status','$expiry','$amount','$category','$quantity','$manufacture','$packing')";
  $result = mysqli_query($conn,$insertMedicineQuery);


}

?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
           

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              <div class="x_title">
                  <div class="title" style="text-align: center; "><h2 >Stock Entry </h2></div>
                   
                  <div class="clearfix"></div>
                </div>
                 <form action="" method="post"  class="form-horizontal form-label-left input_mask">

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Medicine Name <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="medicine" class="form-control" placeholder="Medicine Name" required>
                        </div>
                      </div>

                       
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="status" class="form-control" placeholder="status" required>
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <textarea id="description" row="6" col="100" name="description"></textarea class="form-control" placeholder="description" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="category" class="form-control" placeholder="category" required>
                                   </div>
                                  </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="quantity" class="form-control" placeholder="quantity" required="">
                                   </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Manufacture <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="manufacture" class="form-control" placeholder="manufature" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Packing <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="packing" class="form-control" placeholder="packing" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Expiry <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" name="expiry" class="form-control" placeholder="expiry" required="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount  <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="amount" class="form-control" placeholder="amount" required="">
                        </div>
                      </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <!--    <button type="button" class="btn btn-primary">Cancel</button>
               <button class="btn btn-primary" type="reset">Reset</button>-->
                          <button type="submit" name="submit" class="btn btn-success">Add</button>
                        </div>
                      </div>

                    </form>
              </div>
            </div>

           
          </div>

 </div>
        
        <!-- /page content -->

<?php
require_once('footer.php');
?>