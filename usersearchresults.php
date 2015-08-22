<?php
if(!isset($_COOKIE['userID']))
{
	$pageview = $_COOKIE['pageview'];
	$pageview = $pageview + 1;
	$_COOKIE['pageview'] = $pageview;
	header('location:index.php');
}
else 
{
	session_start();
$_SESSION['leagueID'] = 0;
$_SESSION['teamID'] = 0;
$_SESSION['userID'] = 0;
$_SESSION['memberID'] = 0;
$_SESSION['bookingID'] = 0;
}
?>
<html>
	<head>
	<meta http-equiv="refresh" content="300">
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
					<li><a href="bookings.php" >Booking</a></li>
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
					<h3>Results</h3>
					<?php
					include 'connect.php';
					$table_name = "users";
					
					$userID = $_POST['userID'];
					$sql = "SELECT * FROM $table_name WHERE userID = '$userID'";
					$result = mysql_query($sql);
					echo "<table border='1'>
					<tr>
					<th>User ID</th>
					<th>First Name</th>
					<th>Surname</th>
					<th>Department</th>
					</tr>";
					
					while($row = mysql_fetch_array($result))
					{
						$_SESSION['userID'] = $row['userID'];
						echo "<tr>";
						echo "<td><a href='bookingsearchresults.php'>" . $row['userID'] . "</a></td>";
						echo "<td>" . $row['userFirstName'] . "</td>";
						echo "<td>" . $row['userSurName'] . "</td>";
						echo "<td>" . $row['userDepartment'] . "</td>";
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