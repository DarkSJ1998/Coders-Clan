<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
@font-face
{
	font-family:Supercell;
	src: url('sources/Supercell-magic-webfont.ttf')
}
table,td,tr,th
{
	color: white;
	border: 3px solid white;
	//border-collapse: collapse;
	padding: 10px;
	margin-top: 3%;
	margin-left: 3%;
	margin-right: 3%;
}
a:link
{ color:white; }
a:visited
{ color:white; }
a:hover
{ color:white;background-color: black; }
a:active
{ color:yellow; }
h5
{
	font-family:Supercell;
	color:white;
}
div
{
	//background-image: url('sources/transparent_grey.png');
	//background-image: url('sources/80.png');
	background-color:#FF6347;
	border-radius: 25px;
	//height: 100px;
	padding: 20px;
	width:90%;
	//word-wrap: break-word;
	text-align:left;
	display: inline-block;
}
p
{
	font-family:Segoe UI;
	color:white;
}
.button
{
	font-family:Supercell;
	color:white;
	border: 3px solid white;
	padding: 15px 32px;
	display: inline-block;
	background-color: #FF0000;
	text-decoration: none;
}
</style>
</head>
<body background="sources/carbon2.jpg">
<center>
<?php
	include ('connection.php');
	$user = $_SESSION['user'];
	$query1 = "SELECT * FROM `admin` WHERE `name` = '$user'";
	$result1 = $connection->query($query1);
	$query2 = "SELECT * FROM `user` WHERE `user_id` = '$user'";
	$result2 = $connection->query($query2);
	if($result1->num_rows == 0 && $result2->num_rows == 0)
	{
		echo "
		<img src='sources/shield-icon.png' height='60%'>
		<h2 style='font-family:Supercell;color:white;'> Some error occurred! <br>" . mysqli_error($connection) . "</h2>
		";
	}
	else if($result2->num_rows > 0)
	{
		$row=mysqli_fetch_row($result2);
		$_SESSION['id'] = $row[0];
		echo
			"<br>
			<div>
			<p align='right'>
			<a class = 'button' href='edit_user_profile_user.php'>Edit Details</a>
			</p>
				<table width = 90%>
					<tr>
						<th style='width:50%;'>
							<center><h2 style='font-family:Supercell;color:white;'> User Profile : </h2></center>
						</th>
						<th style='width:50%;'>
							<center><h2 style='font-family:Supercell;color:white;'> $row[3] </h2></center>
						</th>
					</tr>
					<tr>
						<td rowspan=6>
							<h5> RANK:- </h5>
							<center>
							<img src = 'sources\Gold_League.png' alternate = 'image here' width = 146 height = 146><br>
							<h2 style='font-family:Supercell;color:white;'> Forum Member </h2>
							</center>
						</td>
						<td>
							<h3 style='font-family:Georgia;'> ID : # $row[0] &ensp; </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Email ID : $row[2] </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Contact No : $row[6] </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Batch : $row[4] </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Section : $row[5] </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Department : $row[7] </h3>
						</td>
					</tr>
				</table>
				<br>
			</div><br>
			";
	}
?>

</center>
</body>
</html>