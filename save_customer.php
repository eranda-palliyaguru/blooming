<?php

session_start();

include('connect.php');
$a = $_POST['customer_name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$area_id = $_POST['area'];
$root_id = $_POST['root'];
$type = $_POST['type'];
$group = $_POST['group'];
$credit = $_POST['credit'];
$acc_no = $_POST['acc_no'];
$acc_name = $_POST['acc_name'];



$result = $db->prepare("SELECT * FROM area WHERE  id= :userid ");
$result->bindParam(':userid', $area_id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$area_name=$row['name'];
}

$result = $db->prepare("SELECT * FROM root WHERE  id= :userid ");
$result->bindParam(':userid', $root_id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$root=$row['name'];
}

// query

$sql = "INSERT INTO customer (customer_name,address,contact,area,area_id,root,root_id,type,category,acc_no,acc_name,credit_limit) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$area_name,$area_id,$root,$root_id,$type,$group,$acc_no,$acc_name,$credit));
header("location: customer.php");


?>
