<?php
require_once('header.php');

  
if(isset($_POST['submit'])){

  $id = $_POST['id'];

  $medicine=$_POST['medicine'];
  $status=$_POST['status'];
  $description=$_POST['description'];
 
  $quantity=$_POST['quantity'];
  
  $updateMedicineQuery="update medicine set name = '$medicine', description= '$description', status = '$status', quantity= '$quantity' where id = '$id'";
  $result = mysqli_query($conn,$updateMedicineQuery);

}

  $id=$_GET['id'];

  $checkMedicineQuery = "SELECT id, name, description, status, expiry_date, amount, category, quantity, manufacturer, packing FROM medicine where id = '$id'";
  $result = mysqli_query($conn,$checkMedicineQuery);
  while($row = mysqli_fetch_assoc($result)){
    $status = $row['status'];
    $name = $name = $row['name'];
    $description = $row['description'];
    $category = $row['category'];
    $quantity = $row['quantity'];
    $manufacturer = $row['manufacturer'];
    $packing = $row['packing'];
    $expiry_date = $row['expiry_date'];
    $amount = $row['amount'];
  }



?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
           

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              <div class="x_title">
                  <div class="title" style="text-align: center; "><h2 >Update Medicine </h2></div>
                   
                  <div class="clearfix"></div>
                </div>
                 <form action="" method="post"  class="form-horizontal form-label-left input_mask">

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Medicine Name <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                          <input type="text" name="medicine" class="form-control" placeholder="Medicine Name" value = "<?php echo $name; ?>" required>
                        </div>
                      </div>

                       
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="status" id="status" class="form-control" placeholder="status" required>
                          <option value="Available">Available</option>
                          <option value="Not Available">Not Available</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <textarea id="description" row="6" col="100" name="description" value = "<?php echo $description; ?>" class="form-control" placeholder="description"  required></textarea>
                        </div>
                      </div>

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="quantity" class="form-control" value="<?php echo $quantity; ?>" placeholder="quantity" required="">
                                   </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <!--    <button type="button" class="btn btn-primary">Cancel</button>
               <button class="btn btn-primary" type="reset">Reset</button>-->
                          <button type="submit" name="submit" class="btn btn-success">Update</button>
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
<script>
$('document').ready(function(){
  var desc = '<?php echo $description; ?>';
  var status = '<?php echo $status; ?>';
  $('#description').val(desc);
  $('#status').val(status);
});
</script>