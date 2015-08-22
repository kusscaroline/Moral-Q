<?php

include 'connect.php';
$table_name = "members";

$FirstName = $_POST['FirstName'];
$SurName = $_POST['SurName'];
$DOB = $_POST['DOB'];
$Address = $_POST['Address'];
$PostCode = $_POST['PostCode'];
$Phone = $_POST['PhoneNumber'];
$Payment = $_POST['PaymentMethod'];
$DrivingEx = $_POST['DrivingEx'];

$sql = "INSERT INTO $table_name (memberFirstName,memberSurName,memberDOB,memberAddress,memberPostCode,memberPhone,memberPaymentMethod,memberDrivingEx)
VALUES ('$FirstName','$SurName','$DOB','$Address','$PostCode','$Phone','$Payment','$DrivingEx')";

$insert = mysql_query($sql);

echo "Record Added.";

header('refresh: 3; newmember.php');
?>
