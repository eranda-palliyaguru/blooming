<div class="form-group">
              
		<form method="post" action="save_terms.php">
		
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
               
                
				</div>
              </div>
			   <?php
			   

include('connect.php');
$hh=$wcc;
$result = $db->prepare("SELECT * FROM credit_sales_order WHERE order_id= :userid");
$result->bindParam(':userid', $hh);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$h=$row['cus_name'];
$date1 = $row['ls_date'];
$day_interest= $row['day_interest'];
$terms = $row['terms'];
$credit =  $row['amount'];
$credit2 =  $row['amount_left'];
$day_pay =  $row['day_pay'];

}


			   date_default_timezone_set("Asia/Colombo");

                  $date =  date("Y/m/d");
				  $sday= strtotime( $date1);
                  $nday= strtotime($date);
                  $tdf= abs($nday-$sday);
                  $nbday= $tdf/86400;
                  $nbday= intval($nbday);
				  
              $interest = $day_interest*$nbday; 
			  $amount =$day_pay*$nbday;
			  $folt = $credit2-$amount;
			  
			  
			  
			  
			  $chk=2;
			  $full_amount = $interest+$amount;
if($folt<=0){
	$chk = 12;
	$full_amount = $credit2;
	
	
	$cr="complete";
$sql = "UPDATE credit_sales_order 
        SET status=? 
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($cr,$hh));


$sql = "UPDATE customer 
        SET status=? 
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($cr,$hh));
	
	
	
}




			   ?>
			  
			  <div class="form-group">
              
				
        
		
        </div>
      </div>
	   				  
											  
      <!-- /.box -->
<div class="form-group">
              
		
		<h3>pay date <?php  echo $nbday;  ?>  <br>Interest  <?php  echo $interest;  ?>  </h3>
        
			  
			  <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>amount</label>
                <input type="text" name="amount"  value="<?php echo $full_amount; ?>" class="form-control pull-right"  >
                 <input type="hidden" name="cus_name"  value="<?php echo $h; ?>" class="form-control pull-right"  >
				 <input type="hidden" name="day_pay"  value="<?php echo $day_pay; ?>" class="form-control pull-right"  >
				 <input type="hidden" name="chk"  value="<?php echo $chk; ?>" class="form-control pull-right"  >
				 <input type="hidden" name="order_id"  value="<?php echo $hh; ?>" class="form-control pull-right"  >
				 <input type="hidden" name="due_date"  value="<?php echo $nbday; ?>" class="form-control pull-right"  >
				 <input type="hidden" name="interest"  value="<?php echo $interest; ?>" class="form-control pull-right"  > 
				 
				 
                  </div>
				</div>
              </div>
              </div>
			  
			  
			  <input class="btn btn-info" type="submit" value="Submit" >
			  
			  </form>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
       

        
            <!-- /.box-body -->
            
            </div>
          </div>
          <!-- /.box -->
        </div>