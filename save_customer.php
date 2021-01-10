<?php

session_start();

include('connect.php');
$a = $_POST['customer_name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$area_id = $_POST['area'];
$root = $_POST['root'];
$type = $_POST['type'];
$group = $_POST['group'];
$credit = $_POST['credit'];
$acc_no = $_POST['acc_no'];
$acc_name = $_POST['acc_name'];



$result = $db->prepare("SELECT * FROM  WHERE  id= :userid ");
$result->bindParam(':userid', $g);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$area_name=$row['name'];
}




// query

$sql = "INSERT INTO customer (customer_name,address,contact,area,area_id,root,type,category,acc_no,acc_name,credit_limit) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

$q = $db->prepare($sql);

$q->execute(array($a,$b,$c,$area_name,$area_id,$root,$type,$group,$acc_no,$acc_name,$credit));

header("location: gps2.php");





?>
