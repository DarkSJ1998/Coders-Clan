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
	//border: 3px solid white;
	border-collapse: collapse;
	padding: 10px;
	margin-top: 3%;
	margin-left: 3%;
	margin-right: 3%;
	width: 95%;
}
a:link
{ color:white; }
a:visited
{ color:white; }
a:hover
{ color:white; }
a:active
{ color:yellow; }
h5
{
	font-family:Supercell;
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
	word-wrap: break-word;
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
	
	session_start();
	if(!isset($_SESSION['signedin']) && !empty($_SESSION['user']))
	{
		$_SESSION['signedin'] = 0;
		$_SESSION['user'] = -1;
	}
	$query = "SELECT * FROM `thread` ORDER BY `timestamp` DESC";
	$result = $connection->query($query);
	if($result->num_rows == 0)
	{
		echo "
		<img src='sources/shield-icon.png' height='60%'>
		<h2 style='font-family:Supercell;color:white;'> No posts yet! </h2>
		";
	}
	else
	{
		echo
		"<span style='font-family:Segoe UI;color:white;'><center>
		<table>
		";
		while ($row=mysqli_fetch_row($result))					//substr($row[5],0,140) .
		{
			echo
			"<tr>
			<td>
			<div>";
			if($row[2] == 'Question')
			{
				echo "<a href='show_thread.php?thread=$row[0]' target='body'><h5>$row[1]</h5></a>";
			}	
			else
			{
				echo "<a href='show_tutorial.php?tutorial=$row[0]' target='body'><h5>$row[1]</h5></a>";
			}
			echo
			"<p style='float:left;'> " . " &ensp; </p>
			<p style='float:right;'>Posted by: &ensp; $row[3] ";
			$query3 = "SELECT `name` FROM `user` WHERE `user_id` = '$row[3]'";
			$result1 = $connection->query($query3);
			if($result1->num_rows > 0)
			{
				$u=mysqli_fetch_row($result1);
				echo "($u[0])";
			}
			echo"<br>
			Posted on: &ensp; $row[6]</p>
			</div>
			</td>
			</tr>";
		}
		echo "</table></center></span>";
	}
?>

</center>
</body>
</html>