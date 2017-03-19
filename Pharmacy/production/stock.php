<?php
require_once('header.php');
?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
          

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                 <h2>Stock List</h2>
                   
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   <div class="table-responsive">
                      <h2></h2>
                      <table class="table table-striped table-bordered" id="datatable-buttons">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">Medicine Name  </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Description </th>
                            <th class="column-title">Category </th>
                            <th class="column-title">Quantity </th>
                            <th class="column-title">Manufacture </th>
                            <th class="column-title">Packing </th>
                            <th class="column-title">Expiry Date </th>
                            <th class="column-title">Amount in INR </th>
                            </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <?php

                        $checkMedicineQuery = "SELECT id, name, description, status, expiry_date, amount, category, quantity, manufacturer, packing FROM medicine";
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
                    
                  ?>
                        
                        </tbody>
                      </table>
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