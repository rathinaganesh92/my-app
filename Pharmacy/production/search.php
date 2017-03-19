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
                             $status = '<td data-toggle="modal" data-target=".bs-example-modal-lg'.$row['id'].'" style="color: red;">Not Available</td>';
						$id = $row['id'];
						$checkshopQuery = "SELECT id, name,address FROM othershops where medicine_id='$id'";
                        $resultcheckshopQuery = mysqli_query($conn,$checkshopQuery);
						$available = '';
                        while($rowresultcheckshopQuery = mysqli_fetch_assoc($resultcheckshopQuery)){
							$name = $rowresultcheckshopQuery['name'];
							$address = $rowresultcheckshopQuery['address'];
							$available .='<h4>'.$name.'</h4><p>'.$address.'</p>';
						}
						  echo '<div class="modal fade bs-example-modal-lg'.$row['id'].'" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">

								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
								  </button>
								  <h4 class="modal-title" id="myModalLabel">'.$row['name'].' </h4>
								</div>
								<div class="modal-body">
								'.$available.'
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>

							  </div>
							</div>
						  </div>';
						  
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