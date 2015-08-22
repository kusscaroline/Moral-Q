<?php
if(!isset($_COOKIE['userID']))
{
	$pageview = $_COOKIE['pageview'];
	$pageview = $pageview + 1;
	$_COOKIE['pageview'] = $pageview;
	header('location:index.php');
}

session_start();
$_SESSION['leagueID'] = 0;
$_SESSION['teamID'] = 0;
$_SESSION['userID'] = 0;
$_SESSION['memberID'] = 0;
$_SESSION['bookingID'] = 0;
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
					<h3>Results</h3>
					<script type="text/javascript" >
						function edit()
						{
							window.open('/edit.php');
						}
						function deleteRecord()
						{
							var con=confirm("Are you sure you want to delete this record? (If not, press cancel)");
							if(con)
							{
								window.open('/delete.php');
							}
						}
					</script>
					<?php
					include 'connect.php';
					$table_name = "teams";
					
					$teamID= $_POST['teamID'];
					$sql = "SELECT * FROM $table_name WHERE teamID = $teamID";
					$result = mysql_query($sql);
					echo "<table border='1'>
					<tr>
					<th>Team ID</th>
					<th>Team Name</th>
					<th>Team Address</th>
					<th>Points</th>
					<th>Edit</th>
					<th>Delete</th>
					</tr>";
					
					while($row = mysql_fetch_array($result))
					{
						$_SESSION['teamID'] = $row['teamID'];
						$_SESSION['team'] = $row['teamID'];
						echo "<tr>";
						echo "<td><a href='bookingsearchresults.php'>" . $row['teamID'] . "</a></td>";
						echo "<td>" . $row['teamName'] . "</td>";
						echo "<td>" . $row['teamAddress'] . "</td>";
						echo "<td>" . $row['teamPoints'] . "</td>";
						echo "<td><button onclick=edit()>Click Here</button></td>";
						echo "<td><button onclick=deleteRecord()>Click Here</button></td>";
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