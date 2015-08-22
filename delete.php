<?php
	include 'connect.php';
	session_start();
	$member = $_SESSION['member'];
	$team = $_SESSION['team'];
	$booking = $_SESSION['booking'];
	if($member != 0)
	{
		$sql = "DELETE FROM members WHERE memberID = $member";
		$result = mysql_query($sql);
	}
	if($team != 0)
	{
		$sql = "DELETE FROM teams WHERE teamID = $team";
		$result = mysql_query($sql);
	}
	if($booking != 0)
	{
		$sql = "DELETE FROM bookings WHERE bookingID = $booking";
		$result = mysql_query($sql);
	}
?>