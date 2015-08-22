<?php

include 'connect.php';
$table_name = "bookings";

$BookingCategory = $_POST['BookingCategory'];
$BookingFee = (int)$_POST['BookingFee'];
$MemberIDF = $_POST['memberIDF'];
$TeamIDF = $_POST['teamIDF'];
$UserIDF = $_COOKIE['userID'];

if($TeamIDF == 0)
{
	$sql2 = "SELECT memberType FROM members WHERE memberID = $MemberIDF";
	$result2 = mysql_query($sql2); 
	$show = mysql_fetch_array($result2);
	if($show['memberType'] == "Bronze")
	{
		$BookingFee = $BookingFee * 0.9;
	}
	elseif($show['memberType'] == "Silver")
	{
		$BookingFee = $BookingFee * 0.8;
	}
	elseif($show['memberType'] == "Gold")
	{
		$BookingFee = $BookingFee * 0.75;
	}
	$sql = "INSERT INTO $table_name (bookingCategory, bookingFee, memberIDF, userIDF)
	VALUES ('$BookingCategory','$BookingFee','$MemberIDF','$UserIDF')";
}
if($MemberIDF == 0)
{
	$sql = "INSERT INTO $table_name (bookingCategory, bookingFee, teamIDF, userIDF)
	VALUES ('$BookingCategory','$BookingFee','$TeamIDF','$UserIDF')";
}

if(mysql_query($sql))
{
	echo "Booking Added.";
}
else 
{
	die('Error: ' . mysql_error());
}
header('refresh: 3; newbooking.php');
?>
