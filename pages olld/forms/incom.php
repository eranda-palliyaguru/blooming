<?php
session_start();
include('connect.php');

$g = $_POST['amount'];
$b = $_POST['cus_name'];
$c = $_POST['interest'];
$d = $_POST['terms'];
$e = $g/100*$c;
$f = $e/$d;
$g = $_POST['amount'];
$h = "incomplete";
$ii = $_POST['date'];
//edit qty

$j= $g / $d;



                $d1=0;
				$d2=0;
				$result = $db->prepare("SELECT * FROM credit_sales_order  ORDER by sn DESC LIMIT    0, 1 ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				
				for($i=0; $row = $result->fetch(); $i++){
					$ord=$row['order_id'];
					$order_id=$ord+1;
					$a = $order_id ;
				}


$sql = "UPDATE customer 
        SET order_id=?
		WHERE customer_name=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b));

$aaa="incomplete";
$sql = "UPDATE customer 
        SET status=?
		WHERE customer_name=?";
$q = $db->prepare($sql);
$q->execute(array($aaa,$b));



                $d1=0;
				$d2=0;
				$result = $db->prepare("SELECT * FROM customer  ORDER by customer_id DESC LIMIT    0, 1 ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				
				for($i=0; $row = $result->fetch(); $i++){
                            $c_id=$row['customer_id'];
							$cc_id=$c_id+1;
				}


// query
$sql = "INSERT INTO credit_sales_order (order_id,cus_name,interest,terms,terms_left,rate,day_interest,amount,amount_left,status,s_date,ls_date,day_pay) VALUES (:a,:b,:c,:d,:d,:e,:f,:g,:g,:h,:i,:i,:j)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$ii,':j'=>$j));
header("location: invoice.php?id=$cc_id");

?>