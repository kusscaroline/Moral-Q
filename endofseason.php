<?php 
include 'connect.php';

$sql = "UPDATE teams SET leagueIDF = leagueIDF - 1 WHERE leagueIDF = 2 ORDER BY teamPoints DESC LIMIT 2";
$result = mysql_query($sql);
$sql2 = "UPDATE teams SET leagueIDF = leagueIDF + 1 WHERE leagueIDF = 1 ORDER BY teamPoints ASC LIMIT 2";
$result2 = mysql_query($sql2);

echo "Done";

header('refresh :3; intranet.php');
?>