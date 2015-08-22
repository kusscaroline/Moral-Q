<?php
include 'connect.php';
$table_name = "bookings";

session_start();
$_SESSION['leagueID'] = 0;
$_SESSION['teamID'] = 0;
$_SESSION['userID'] = 0;
$_SESSION['memberID'] = 0;
$_SESSION['bookingID'] = 0;

$bookingID = $_POST['bookingID'];
$_SESSION['bookingID'] = $bookingID;

header('location: bookingsearchresults.php');
?>