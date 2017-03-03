<?php
require_once('header.php');
?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
          

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="title" style="text-align: center; "><h2 >Search Medicine </h2></div>
                   
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                 <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Medicine Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="medicine" required="required" name="medicine" placeholder="Please enter medicine name" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                         <button type="submit" name="search" class="btn btn-success">Search</button>
                         </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                   

                </form>
                <br>
                <br>
                </div>
                <div class="col-md-12">
                  <table class="table">
                    <tr>
                      <th>Medicine</th>
                      <th>Status</th>
                      <th>Description</th>      
                      <th>Category</th>
                      <th>Quantity</th>
                      <th>Manufacturer</th>
                      <th>Packing</th>
                      <th>Expiry Date</th>
                      <th>Amount in INR</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      if(isset($_POST['search'])){
  
                        $medicine=$_POST['medicine'];

                        $checkMedicineQuery = "SELECT id, name, description, status, expiry_date, amount, category, quantity, manufacturer, packing FROM medicine where name like '%$medicine%'";
                        $result = mysqli_query($conn,$checkMedicineQuery);
                        while($row = mysqli_fetch_assoc($result)){
                        if($row['status'] == 'Available'){
                          $status = '<td style="color: green;">Available</td>';
                        }else{
                           $status = '<td style="color: red;">Not Available</td>';
                        }
                        echo "<tr>
                          <td>".$row['name']."</td>
                          ".$status."
                          <td>".$row['description']."</td>
                          <td>".$row['category']."</td>
                          <td>".$row['quantity']."</td>
                          <td>".$row['manufacturer']."</td>
                          <td>".$row['packing']."</td>
                          <td>".$row['expiry_date']."</td>
                          <td>".$row['amount']."</td>
                          <td><a href='update.php?id=".$row['id']."'>Update</a></td>
                        </tr>";
                    
                     }
                    }
                  ?>
                  </table>
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