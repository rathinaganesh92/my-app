<?php
require_once('header.php');
?>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
           

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              <div class="x_title">
                  <div class="title" style="text-align: center; "><h2 >Bill Receipts </h2></div>
                  <a href="generatebill.php" class="btn btn-info pull-right" role="button">Create</a>
                  <div class="clearfix"></div>
                </div>
				 <div class="x_content">
                   <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">Bill No.  </th>
							<th class="column-title">Name </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Amount </th>
                            </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <?php

                        $Query = "SELECT billno, name, Date, Amount, taxamount, nettotal, Address FROM bill";
                        $result = mysqli_query($conn,$Query);
                        while($row = mysqli_fetch_assoc($result)){
                        
                        echo "<tr>
                          <td>".$row['billno']."</td>
                          <td><a href=printbill.php?id=".$row['billno'].">".$row['name']."</a></td>
                          <td>".$row['Date']."</td>
                          <td>".$row['nettotal']."</td>
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