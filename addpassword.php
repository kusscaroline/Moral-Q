<?php
include 'connect.php';

$tabel_name = "users";
$userID = $_COOKIE['userID'];
$newpassword = $_POST['newpassword'];
$conpassword = $_POST['conpassword'];

if(strlen($newpassword) < 6)
{
	echo "Password needs to have more than six characters.";
	header("refresh: 3;addpassword.html");
}
elseif($conpassword == $newpassword && strlen($newpassword) >= 6)
{
	$newpassword = md5($newpassword);
	$sql = "UPDATE users SET userPassword = '$newpassword' WHERE userID='$userID'";
	$result = mysql_query($sql);
	setcookie("userID",' ',1);
	echo "Success.";
	header("refresh: 3;index.php");
}
else
{
		echo "Error. Please try again.";
		header("refresh: 3;addpassword.html");
}