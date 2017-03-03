<?php
require_once('header.php');
?>
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
        <!-- page content -->
        <div class="right_col" role="main">
       
          <div class="row">
           

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              <div class="x_title">
                  <div class="title" style="text-align: center; "><h2 ></h2></div>
					<div class="container">
					<?php
						$id = $_REQUEST['id'];
						$Query = "SELECT billno, name, Date, Amount, taxamount, nettotal, Address FROM bill where billno='$id'";
                        $result = mysqli_query($conn,$Query);
                        $row = mysqli_fetch_assoc($result);
						$name = $row['name'];
						$Date = $row['Date'];
						$Amount = $row['Amount'];
						$taxamount = $row['taxamount'];
						$nettotal = $row['nettotal'];
						$address = $row['Address'];
					?>
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Pharmacy</h2><h3 class="pull-right">Bill No: #<?php echo $id; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Address:</strong><br>
    					<?php echo $name; ?><br>
    					<?php echo $address; ?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Date:</strong><br>
    					<?php echo $Date; ?><br><br>
    				</address>
    			</div>
    		</div>
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Bill Summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<?php 
								$Query = "SELECT * FROM bill_medicine bm join bill b on b.billno = bm.bill_id where b.billno = '$id'";
								$result = mysqli_query($conn,$Query);
								while($row = mysqli_fetch_assoc($result)){
									echo '<tr>
										<td>'.$row['item'].'</td>
										<td class="text-center">'.$row['price'].'</td>
										<td class="text-center">'.$row['quantity'].'</td>
										<td class="text-right">'.$row['amount'].'</td>
									</tr>';
								}?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Sub-total</strong></td>
    								<td class="thick-line text-right"><?php echo $Amount; ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax 14%</strong></td>
    								<td class="no-line text-right"><?php echo $taxamount; ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Net Amount</strong></td>
    								<td class="no-line text-right"><?php echo $nettotal; ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
                  <div class="clearfix"></div>
                </div>
				
              </div>
            </div>

           
          </div>

 </div>
        
        <!-- /page content -->

<?php
require_once('footer.php');
?>