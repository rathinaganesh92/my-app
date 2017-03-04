<?php
ob_start();
require_once('header.php');

if(isset($_POST['type']) && $_POST['type'] == 'fetchPrice'){
	$id = $_POST['id'];
	$Query = "SELECT amount FROM medicine where id = '$id'";
	$result1 = mysqli_query($conn,$Query);
	$row1 = mysqli_fetch_assoc($result1);
	ob_end_clean();
	echo json_encode($row1['amount']);exit;	
}

if(isset($_POST['type']) && $_POST['type'] == 'searchmedicine'){
	$name = $_POST['name'];
	$checkMedicineQuery = "SELECT id, name FROM medicine where name like '%$name%'";
	$result = mysqli_query($conn,$checkMedicineQuery);
	while($row = mysqli_fetch_assoc($result)){
		$medicine[] = array('label'=>$row['name'],'value'=>$row['id']);
	}
	ob_end_clean();
	echo json_encode($medicine);exit;
}



if(isset($_POST['Generatebill'])){

  $name=$_POST['name'];
  $address=$_POST['address'];
  $date=$_POST['date'];
  $subtotal=$_POST['subtotal'];
  $taxamount=$_POST['taxamount'];
  $netamount=$_POST['netamount'];
  $Query="INSERT INTO bill(name, Date, Amount, taxamount, nettotal, Address) VALUES ('$name','$date','$subtotal','$taxamount','$netamount','$address')";
  mysqli_query($conn,$Query);
  $billid = mysqli_insert_id($conn);
  for($i=1;$i<20;$i++){
	  if(!(empty($_POST['medicine'.$i]))){
		  $medicine = $_POST['medicine'.$i];
		  $price = $_POST['price'.$i];
		  $quantity = $_POST['quantity'.$i];
		  $total = $_POST['total'.$i];
		  $Query="INSERT INTO bill_medicine(bill_id, item, price, quantity, amount) VALUES ('$billid','$medicine','$price','$quantity','$total')";
          mysqli_query($conn,$Query);
	  }
  }  
  echo "<script type='text/javascript'> document.location = 'http://localhost/Pharmacy/production/printbill.php?id=$billid'; </script>";
  
	

}

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
		<form name="bill" id="bill" method="post" action="">
        <div class="right_col" role="main">
       
          <div class="row">
           

             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              <div class="x_title">
                  <div class="title" style="text-align: center; "><h2 ></h2></div>
					<div class="container">
					
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Pharmacy</h2><h3 class="pull-right">Bill #</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Namd & Address:</strong><br>
    					<input type="text" name="name" class="form-control" placeholder="Enter Name" required><br>
    					<textarea class="form-control" placeholder="Enter Address" name="address" required></textarea><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Date:</strong><br>
    					<input type="date" name="date" class="form-control" placeholder="Enter Date" required><br><br>
    				</address>
    			</div>
    		</div>
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Bill Summary </strong></h3>(Click + to add more)
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
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
								<?php for($itemList=1;$itemList<=20;$itemList++){
								?>
    							<tr class="item<?php echo $itemList; ?> list">
    								<td><input type="text" name="medicine<?php echo $itemList; ?>" id="medicine<?php echo $itemList; ?>" class="form-control tally" placeholder="Enter Medicine"></td>
    								<td class="text-center"><input type="number" id="price<?php echo $itemList; ?>" name="price<?php echo $itemList; ?>" class="form-control tally" placeholder="Enter Price"></td>
    								<td class="text-center"><input type="number" name="quantity<?php echo $itemList; ?>" id="quantity<?php echo $itemList; ?>" class="form-control tally" placeholder="Enter Quantity"></td>
    								<td class="text-right"><input type="text" name="total<?php echo $itemList; ?>" id="total<?php echo $itemList; ?>" class="form-control tally" required></td>
    							</tr>
								<?php } ?>
    							
								
    							<tr>
    								<td class="no-line"><span class="fa fa-plus fa-1x add"></span></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Sub-total</strong></td>
    								<td class="thick-line text-right"><input type="text" name="subtotal" id="subtotal" class="form-control" required readonly></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax 14%</strong></td>
    								<td class="no-line text-right"><input type="text" name="taxamount" id="taxamount" class="form-control" required readonly></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Net Amount</strong></td>
    								<td class="no-line text-right"><input type="text" name="netamount" id="netamount" class="form-control" required readonly></td>
    							</tr>
								<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong></strong></td>
    								<td class="no-line text-right"><input type="submit" name="Generatebill" value="Generate Bill" id="Generatebill" class="form-control btn btn-info"></td>
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
        				</form>

        <!-- /page content -->
	
<?php
require_once('footer.php');
?>
<script>
		$(document).ready(function(){
			$('.list').hide();
			$('.item1').show();
			var itemCount = 1;
			$('.add').on('click',function(){
				itemCount++;
				$('.item'+itemCount).show();
			});
			$('.tally').on('click blur keyup',function(){
				var i=0,tot=0,price=0,subtotal=0,taxamount=0,netamount=0;
				for(i=1;i<=20;i++){
					tot = +$('#quantity'+i).val() * +$('#price'+i).val();
					$('#total'+i).val(tot);
					subtotal = +subtotal + +tot;
					$('#subtotal').val(subtotal);
					taxamount = subtotal * .14;
					taxamount = taxamount.toFixed(2);
					$('#taxamount').val(taxamount);
					netamount = +subtotal + +taxamount;
					$('#netamount').val(netamount);
				}
			});
			
			for(var i=1;i<=20;i++){	
				$('#medicine'+i).on('click change keyup',function(){
					
					var name = $(this).val();
					var medid = $(this).attr('id');
					$.ajax({
						url:'generatebill.php',
						type:'post',
						async:false,
						data:{type:'searchmedicine',name:name},
						dataType:'json',
						success:function(data){
							$( "#"+medid ).autocomplete({
							  source:data,
							  autoFocus: true ,
							  select: function(event, ui) {
								$("#"+medid ).val(ui.item.label);
								   var key = ui.item.value;
									$.ajax({
										url:'generatebill.php',
										type:'post',
										async:false,
										data:{type:'fetchPrice',id:key},
										dataType:'json',
										success:function(res){
											var pid = medid.slice(-1);
											$('#price'+pid).val(res);
										}
									});
								return false; // Prevent the widget from inserting the value.
								},
								focus: function(event, ui) {
									$("#"+medid).val(ui.item.label);
									return false; // Prevent the widget from inserting the value.
								}
							});
						}
					});
				});
				
			}
		});
	</script>
