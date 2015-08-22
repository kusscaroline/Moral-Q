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
						$table1 = "members";
						$table2 = "teams";
						$table3 = "bookings";
						$table4 = "league";
						$table5 = "users";
						
						echo "<h2>Summary</h2>";
						
						echo "<h4><a href='members.php'>Member</a></h4>";
						
						$sql1 = "SELECT COUNT(memberID) FROM $table1";
						$result1 = mysql_query($sql1);
						$show1 = mysql_fetch_array($result1);
						
						echo "<ul>There are currently " . $show1[0] . " members registered.<br/>";
						
						$sql2 = "SELECT COUNT(memberID) FROM $table1 WHERE memberPaymentMethod = 'Direct Debit'";
						$result2 = mysql_query($sql2);
						$show2 = mysql_fetch_array($result2);
						
						echo "There are " . $show2[0] . " members with direct debit payment setup.<br/>";
						
						$sql3 = "SELECT COUNT(memberID) FROM $table1 WHERE memberDrivingEx >= 3";
						$result3 = mysql_query($sql3);
						$show3 = mysql_fetch_array($result3);
						
						echo "There are " . $show3[0] . " members that have 3 or more years of go-karting experience.<br/></ul>";
						
						if($_COOKIE['permission'] == 1)
						{
							echo "<h4><a href='users.php'>Users</a></h4>";
							
							$sql6 = "SELECT COUNT(userID) FROM $table5";
							$result6 = mysql_query($sql6);
							$show6 = mysql_fetch_array($result6);
							
							echo "<ul>There are " . $show6[0] . " users in the system.<br/></ul>";
							}
						
						echo "<h4><a href='teams.php'>Teams</a></h4>";
						
						$sql4 = "SELECT COUNT(teamID) FROM $table2";
						$result4 = mysql_query($sql4);
						$show4 = mysql_fetch_array($result4);
						
						echo "<ul>There are " . $show4[0] . " teams registered.<br/>";
						
						$sql5 = "SELECT COUNT(teamID) FROM $table2 WHERE leagueIDF = 1";
						$result5 = mysql_query($sql5);
						$show5 = mysql_fetch_array($result5);
						
						echo "There are " . $show5[0] . " teams in the premier league.<br/>";
												
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

