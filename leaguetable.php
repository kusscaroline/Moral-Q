<?php
if(!isset($_COOKIE['userID']))
{
	$pageview = $_COOKIE['pageview'];
	$pageview = $pageview + 1;
	$_COOKIE['pageview'] = $pageview;
	header('location:index.php');
}
?>
<html>
	<head>
	<meta http-equiv="refresh" content="3">
		<title>
			SuperSpeed Intranet
		</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>
					SuperSpeed Intranet
				</h1>
			</div>
			<div id="navigation">
				<ul>
					<li><a href="intranet.php">Home</a></li>
					<li><a href="bookings.php">Bookings</a></li>
					<li><a href="members.php">Members</a></li>
					<?php
					if($_COOKIE['permission'] == 1)
					{
						echo "<li><a href='users.php'>Users</a></li>";
						}
						?>
					<li><a href="teams.php" >Teams</a></li>
					<li><a href="league.php" >League</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<div id="content-container1">
				<div id="content-container2">
					<div id="section-navigation">
					<h3>Notes</h3>
					<ul>
					<li>Please make sure not to write down your login password anywhere. </li>
					</ul>
					</div>
					<div id="content">
						<?php
						include 'connect.php';
						
						$table_name = "teams";
						
						$sql = "SELECT * FROM $table_name WHERE leagueIDF = 1 ORDER BY teamPoints DESC";
						$result = mysql_query($sql);
						echo "<h3>Premier League</h3>
						<table border='1'>
						<tr>
						<th>Name</th>
						<th>Points</th>
						</tr>";
						while($row = mysql_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['teamName'] . "</td>";
							echo "<td>" . $row['teamPoints'] . "</td>";
							echo "</tr>";
						} 			
						echo "</table>";
						
						$sql2 = "SELECT * FROM $table_name WHERE leagueIDF = 2 ORDER BY teamPoints DESC";
						$result2 = mysql_query($sql2);
							
						echo "<h3>League 1</h3>
						<table border='1'>
						<tr>
						<th>Name</th>
						<th>Points</th>
						</tr>";
						while($row2 = mysql_fetch_array($result2))
						{
							echo "<tr>";
							echo "<td>" . $row2['teamName'] . "</td>";
							echo "<td>" . $row2['teamPoints'] . "</td>";
							echo "</tr>";
						}	
						echo "</table>";
						?>
					</div>
					<div id="aside">
						<?php
						include 'connect.php';
						echo "Welcome " . $_COOKIE['userName'] . "<br/>";	
						if($_COOKIE['permission'] == 1)
						{
							echo "You have all the bases.";
							}
						?>	
					</div>
					<div id="footer">
						SuperSpeed
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
