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
	$bookingm = $_SESSION['memberID'];
	$bookingu = $_SESSION['userID'];
	$bookingt = $_SESSION['teamID'];
	$bookingi = $_SESSION['bookingID'];
}
?>
<html>
	<head>
	<meta http-equiv="refresh" content="3"/>
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
					$table_name = "bookings";
					
					echo "<h3>Booking Results</h3>";
					
					if($bookingm != 0)
					{
						$sql = "SELECT * FROM $table_name WHERE memberIDF = '$bookingm'";
						$result = mysql_query($sql);
						echo "<table border='1'>
							<tr>
							<th>Booking ID</th>
							<th>Booking Category</th>
							<th>Booking Fee</th>
							<th>Member ID</th>
							<th>Team ID</th>
							<th>User ID</th>
							<th>Edit</th>
							<th>Delete</th>
							</tr>";
					
						while($row = mysql_fetch_array($result))
							{
								$_SESSION['booking'] = $row['bookingID'];
							echo "<tr>";
							echo "<td>" . $row['bookingID'] . "</td>";
							echo "<td>" . $row['bookingCategory'] . "</td>";
							echo "<td>" . $row['bookingFee'] . "</td>";
							echo "<td>" . $row['memberIDF'] . "</td>";
							echo "<td>" . $row['teamIDF'] . "</td>";
							echo "<td>" . $row['userIDF'] . "</td>";
							echo "<td><button onclick=edit()>Click Here</button></td>";
							echo "<td><button onclick=deleteRecord()>Click Here</button></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					elseif($bookingu != 0)
					{
							$sql = "SELECT * FROM $table_name WHERE userIDF = $bookingu";
							$result = mysql_query($sql);
						echo "<table border='1'>
						<tr>
						<th>Booking ID</th>
						<th>Booking Category</th>
						<th>Booking Fee</th>
						<th>Member ID</th>
						<th>Team ID</th>
						<th>User ID</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>";
					
						while($row = mysql_fetch_array($result))
							{
								$_SESSION['booking'] = $row['bookingID'];
							echo "<tr>";
							echo "<td>" . $row['bookingID'] . "</td>";
							echo "<td>" . $row['bookingCategory'] . "</td>";
							echo "<td>" . $row['bookingFee'] . "</td>";
							echo "<td>" . $row['memberIDF'] . "</td>";
							echo "<td>" . $row['teamIDF'] . "</td>";
							echo "<td>" . $row['userIDF'] . "</td>";
							echo "<td><button onclick=edit()>Click Here</button></td>";
							echo "<td><button onclick=deleteRecord()>Click Here</button></td>";
							echo "</tr>";
						}
						echo "</table>";				
					}
					elseif($bookingt != 0)
					{
						$sql = "SELECT * FROM $table_name WHERE teamIDF = '$bookingt'";
						$result = mysql_query($sql);
						
						echo "<table border='1'>
						<tr>
						<th>Booking ID</th>
						<th>Booking Category</th>
						<th>Booking Fee</th>
						<th>Member ID</th>
						<th>Team ID</th>
						<th>User ID</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>";
						
						while($row = mysql_fetch_array($result))
						{
							$_SESSION['booking'] = $row['bookingID'];
						echo "<tr>";
						echo "<td>" . $row['bookingID'] . "</td>";
						echo "<td>" . $row['bookingCategory'] . "</td>";
						echo "<td>" . $row['bookingFee'] . "</td>";
						echo "<td>" . $row['memberIDF'] . "</td>";
						echo "<td>" . $row['teamIDF'] . "</td>";
						echo "<td>" . $row['userIDF'] . "</td>";
						echo "<td><button onclick=edit()>Click Here</button></td>";
						echo "<td><button onclick=deleteRecord()>Click Here</button></td>";
						echo "</tr>";
					}
						echo "</table>";				
					}
					elseif($bookingi != 0)
					{
						$sql = "SELECT * FROM $table_name WHERE bookingID = '$bookingi'";
						$result = mysql_query($sql);
						
						echo "<table border='1'>
						<tr>
						<th>Booking ID</th>
						<th>Booking Category</th>
						<th>Booking Fee</th>
						<th>Member ID</th>
						<th>Team ID</th>
						<th>User ID</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>";
						
						while($row = mysql_fetch_array($result))
						{
							$_SESSION['booking'] = $row['bookingID'];
						echo "<tr>";
						echo "<td>" . $row['bookingID'] . "</td>";
						echo "<td>" . $row['bookingCategory'] . "</td>";
						echo "<td>" . $row['bookingFee'] . "</td>";
						echo "<td>" . $row['memberIDF'] . "</td>";
						echo "<td>" . $row['teamIDF'] . "</td>";
						echo "<td>" . $row['userIDF'] . "</td>";
						echo "<td><button onclick=edit()>Click Here</button></td>";
						echo "<td><button onclick=deleteRecord()>Click Here</button></td>";
						echo "</tr>";
					}
						echo "</table>";				
					}
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
						SuperSpeed Intranet
					</div>
				</div>
			</div>
		</div>
	</body>
</html>