<?php
	include 'connect.php';
	session_start();
	$mID = $_SESSION['member'];
	$tID = $_SESSION['team'];
	$bID = $_SESSION['booking'];
	
	if($mID != 0)
	{
		$firstname = $_POST['FirstName'];
		if($firstname != NULL)
		{
			$sql = "UPDATE members SET memberFirstName = '$firstname' WHERE memberID = $mID";
			$result = mysql_query($sql); 
		}
		$surname = $_POST['SurName'];
		if($surname != NULL)
		{
			$sql = "UPDATE members SET memberSurName = '$surname' WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
		$dob = $_POST['DOB'];
		if($dob != NULL)
		{
			$sql = "UPDATE members SET memberDOB = '$dob' WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
		$address = $_POST['Address'];
		if($address != NULL)
		{
			$sql = "UPDATE members SET memberAddress = '$address' WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
		$postcode = $_POST['PostCode'];
		if($postcode != NULL)
		{
			$sql = "UPDATE members SET memberPostCode = '$postcode' WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
		$phone = $_POST['PhoneNumber'];
		if($phone != NULL)
		{
			$sql = "UPDATE members SET memberPhoneNumber = $phone WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
		$payment = $_POST['PaymentMethod'];
		if($payment != NULL)
		{
			$sql = "UPDATE members SET memberPaymentMethod = '$payment' WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
		$driving = $_POST['DrivingEx'];
		if($driving != NULL)
		{
			$sql = "UPDATE members SET memberDrivingEx = $driving WHERE memberID = $mID";
			$result = mysql_query($sql);
		}
	}
	if($tID != 0)
	{	
		$teamname = $_POST['TeamName'];
		if($teamname != NULL)
		{
			$sql = "UPDATE teams SET teamName = '$teamname' WHERE teamID = $tID";
			$result = mysql_query($sql);		
		}
		$address = $_POST['Address'];
		if($address != NULL)
		{
			$sql = "UPDATE teams SET teamAddress = '$address' WHERE teamID = $tID";
			$result = mysql_query($sql);
		}
		$league = $_POST['LeagueIDF'];
		if($league != NULL)
		{
			$sql = "UPDATE teams SET leagueIDF = $league WHERE teamID = $tID";
			$result = mysql_query($sql);
		}
	}
	if($bID != 0)
	{
		$cat = $_POST['BookingCategory'];
		if($cat != NULL)
		{
			$sql = "UPDATE bookings SET bookingCategory = '$cat' WHERE bookingID = $bID";
			$result = mysql_query($sql);
		}
		$fee = $_POST['BookingFee'];
		if($fee != NULL)
		{
			$sql = "UPDATE bookings SET bookingFee = $fee WHERE bookingID = $bID";
			$result = mysql_query($sql);
		}
	}
?>