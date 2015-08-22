<?php

include 'connect.php';
$table_name = "teams";

$TeamName = $_POST['TeamName'];
$Address = $_POST['Address'];
$Points = 0;
$League = $_POST['LeagueIDF'];

$sql = "INSERT INTO $table_name (teamName, teamAddress, teamPoints, leagueIDF)
VALUES ('$TeamName', '$Address','$Points','$League')";

$insert = mysql_query($sql);

echo "Record Added.";

header('refresh: 3; newteam.php');
?>
