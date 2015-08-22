<?php
	include 'connect.php';
	session_start();
	$booking = $_SESSION['booking'];
	$team = $_SESSION['team'];
	$member = $_SESSION['member'];
	$user = $_SESSION['user'];
	
	if($booking != 0)
	{
		echo "<form action='update.php' method='post'>
					<input type='hidden' value=" . $booking . " name='BookingID'><br/> 
					Booking Category: <select name='BookingCategory' id='BookingCategory'>
																	<option value='Public'>Public</option>
																	<option value='Private'>Private</option>
																	<option value='Team'>Team</option>
																	</select><br/>
					Booking Fee: <input type='text' name='BookingFee'><br/>
					Member ID: <input type='text' name='memberIDF'><br/>
					Team ID: <input type='text' name='teamIDF'><br/>
					<input type='submit' value='Submit'>
					</form>";
	}
	elseif($team != NULL)
	{
		echo "<form action='update.php' method='post'>
		     <input type='hidden' value=" . $team . " name='TeamID'><br/>
					Team Name: <input type='text' name='TeamName'><br/>
					Address: <input type='text' name='Address'><br/>
					League: <select name='LeagueIDF' id='LeagueIDF'>
																<option value='1' >Premier League</option>
																<option value='2' >League 1</option>
																</select><br/>
					<input type='submit' value='Add'>
					</form>";
	}
	elseif($member != 0)
	{
		echo "<form action='update.php' method='post'>
					<input type='hidden' value=" . $member . " name='MemberID'><br/>
					First Name: <input type='text' name='FirstName'>
					Surname: <input type='text' name='SurName'><br/>
					Date of birth(YYYY-MM-DD): <input type='text' name='DOB'><br/>
					Address: <input type='text' name='Address'><br/>
					Postcode: <input type='text'  name='PostCode'><br/>
					Phone Number: <input type='text' name='PhoneNumber'><br/>
					Payment Method: <select name='PaymentMethod' id='PaymentMethod'>
																<option value='Direct Debit' >Direct Debit</option>
																<option value='Cash'>Cash</option>
																<option value='Check'>Check</option>
																</select><br/>
					Years of driving experience: <input type='text' name='DrivingEx'><br/>
					<input type='submit' value='Add'>
					</form>";
	}
?>