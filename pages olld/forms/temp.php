<?php
session_start();
include('connect.php');


$w = $_POST['cus_name'];

header("location: terms2.php?id=$w");

?>