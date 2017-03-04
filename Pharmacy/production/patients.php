<?php
require_once('header.php');
?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
          

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                 <h2>Patients List</h2>
                   
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   <div class="table-responsive">
                      <h2></h2>
                      <table class="table table-striped table-bordered" id="datatable-buttons">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">Name  </th>
                            <th class="column-title">Mobile </th>
                            <th class="column-title">Address </th>
                            </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <?php

                        $checkPatientQuery = "SELECT * FROM patients";
                        $result = mysqli_query($conn,$checkPatientQuery);
                        while($row = mysqli_fetch_assoc($result)){
                        
                        echo "<tr>
                          <td>".$row['name']."</td>
                          <td>".$row['mobile']."</td>
                          <td>".$row['address']."</td>
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