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
						$sql = "SELECT * FROM teams WHERE leagueIDF = 1";
						$sql2 = "SELECT * FROM teams WHERE leagueIDF = 2";
						$result = mysql_query($sql);
						$result2 = mysql_query($sql2);
						
						echo "<form method='post' action='resultenter.php'>
						Team that won in premier league: ";
						echo "<select name='teamID' id='teamID'>";
						while($show = mysql_fetch_array($result))
						{
							echo "<option value = " . $show['teamID'] . ">" . $show['teamName'] . "</option>";
						}
						echo "</select><br/>";
						echo "Team that won in league 1: ";
						echo "<select name='teamID2' id='teamID2'>";
						while($show2 = mysql_fetch_array($result2))
						{
							echo "<option value = " . $show2['teamID'] . ">" . $show2['teamName'] . "</option>";
						}
						echo "</select><br/>";
						echo "<input type='submit' value='Submit'>";
						echo "</form>";
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