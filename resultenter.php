<?php
include 'connect.php';
$team1 = $_POST['teamID'];
$team2 = $_POST['teamID2'];

echo $team1 . $team2;

$sql = "UPDATE teams SET teamPoints=teamPoints+3 WHERE teamID = $team1";
$sql2 = "UPDATE teams SET teamPoints=teamPoints+3 WHERE teamID = $team2";
$result = mysql_query($sql);
$result2 = mysql_query($sql2);


?>