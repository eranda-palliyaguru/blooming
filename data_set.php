<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");

$result = $db->prepare("SELECT * FROM customer WHERE area='Kurunegala' ");
$result->bindParam(':userid', $res);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$id=$row['customer_id'];


$name=2;

$sql = "UPDATE customer
        SET area_id=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($name,$id));


}


?>
