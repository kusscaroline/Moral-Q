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
					<li><a href="bookings.php" >Bookings</a></li>
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
					<form action="newbookingadd.php" method="post">
					Booking Category: <select name="BookingCategory" id="BookingCategory">
																	<option value="Public" selected>Public</option>
																	<option value="Private">Private</option>
																	<option value="Team">Team</option>
																	</select><br/>
					Booking Fee: <input type="text" name="BookingFee"><br/>
					Member ID: <input type="text" name="memberIDF"><br/>
					Team ID: <input type="text" name="teamIDF"><br/>
					<input type="submit" value="Submit">
					</form>
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

