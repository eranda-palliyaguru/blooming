<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");
$a = "93903";

$b = "admin";
$c = date("Y/m/d");

$d = $_POST['order_id'];

//$result = $db->prepare("SELECT * FROM customer WHERE order_id= :userid");
//$result->bindParam(':userid', $d);
//$result->execute();
//for($i=0; $row = $result->fetch(); $i++){
//$hh=$row['customer_name'];

//}

$h=$_POST['cus_name'];

$chk=$_POST['chk'];


$e = $_POST['amount'];


$f = $_POST['interest'];
$ee=$e-$f;

$g = $_POST['due_date'];

$day_pay=$_POST['day_pay'];
$terms_left= $ee/$day_pay;

$sql = "UPDATE credit_sales_order 
        SET terms_left=terms_left-? 
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($terms_left,$d));




$sql = "UPDATE credit_sales_order 
        SET ls_date=? 
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($c,$d));




$sql = "UPDATE credit_sales_order 
        SET amount_left=amount_left-? 
		WHERE order_id=?";
$q = $db->prepare($sql);
$q->execute(array($ee,$d));

echo $chk;



//edit qty


// query
$sql = "INSERT INTO sales (invoice_number,cashier,date,order_id,amount,interest,due_date,name) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h));
//header("location: sales.php?id=$w&invoice=$a");


?>