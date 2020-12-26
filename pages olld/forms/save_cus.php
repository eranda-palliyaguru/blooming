<?php
session_start();
include('connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['pu_number'];
$d = $_POST['nic'];
$e = $_POST['email'];
$f = $_POST['chq'];
$g = $_POST['bank'];
$h = $_POST['gr1'];
$i = $_POST['gr2'];

$j="complete";
// query
$sql = "INSERT INTO customer (customer_name,address,contact,nic,email,chq_no,bank,guarantor1,guarantor2,status) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j));
header("location: cus.php");


?>