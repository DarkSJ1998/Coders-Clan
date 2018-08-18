<?php
	session_start();
?>
<html>
<head>
<meta name="viewport" width="device-width">
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
}
a:link
{ color:white; }
a:visited
{ color:white; }
a:hover
{ color:white;background-color: black; }
a:active
{ color:yellow; }
h3
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
	//width:90%;
	width:1300px;
	word-wrap: break-word;
	text-align:left;
	display: inline-block;
	
	margin-top: 3%;
	margin-left: 3%;
	margin-right: 3%;
	white-space: nowrap;
	//white-space: initial;
	overflow: auto;
	
	word-break: break-all;
	text-align: justify;
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
<marquee style="background:#b70e0e;font-family:Supercell;color:white;width:100%;" behavior="alternate"> Threads </marquee>
<center>
<!--

-->
<?php
	include ('connection.php');
	//$title = $_SESSION['title'];
	
	$id = $_GET['thread'];
	$_SESSION['thread_id'] = $id;
	$query = "SELECT * FROM `thread` WHERE `type` = 'Question' AND `thread_id` = '$id'";
	$result = $connection->query($query);
	if($result->num_rows == 0)
	{
		echo "
		<img src='sources/shield-icon.png' height='60%'>
		<h2 style='font-family:Supercell;color:white;'> Sorry an error occurred in finding : " . $title ." !</h2>
		";
	}
	else
	{
		//echo 		"<span >";
		$row=mysqli_fetch_row($result);
		$_SESSION['type'] = $row[2];
		echo
		"<div style='color:white;border:10px solid #FFD700;'><h3>[Q] $row[1]</h3>
		<p style='float:left;'> " . $row[5] . " &ensp; </p>
		<br><br><br><p style='float:right;'>Posted by: &ensp; $row[3] ";
		$query2 = "SELECT * FROM `admin` WHERE `name` = '$row[3]'";
		$result = $connection->query($query2);
		if($result->num_rows > 0)
		{
			echo "(*Forum Admin*)";
		}
		$query3 = "SELECT `name` FROM `user` WHERE `user_id` = '$row[3]'";
		$result1 = $connection->query($query3);
		if($result1->num_rows > 0)
		{
			$u=mysqli_fetch_row($result1);
			echo "($u[0])";
		}
		echo"
		<br>
		Posted on: &ensp; $row[6] </p>
		";
		if($_SESSION['signedin'] == 1)
			echo "<a class='button' href='post_reply.php?id=$row[0]'>REPLY</a>";
		
		if($row[3] == $_SESSION['user'])
		{
			echo "<a class='button' href='edit_post_admin.php?id=$row[0]'>EDIT</a>";
			echo "<a class='button' href='delete_thread.php?id=$row[0]'>DELETE</a>";
		}
		echo
		"
		</div>
		";
		////Replies
		$query3 = "SELECT * FROM `replies` WHERE `thread_id` = '$row[0]'";
		$result2 = $connection->query($query3);
		if($result2->num_rows > 0)
		{
			echo "<h3>REPLIES:-</h3>";
			echo 
			"<span style='font-family:Segoe UI;color:white;'><center>
			<table>
			";
			while($reply=mysqli_fetch_row($result2))
			{
				echo
				"<tr>
				<td>
				<div style='border:2px solid white;'>
				<h4>[*] $reply[1]</h4></a>
				<p style='float:left;'> " . $reply[4] . " &ensp; </p>
				<p style='float:right;'>Posted by: &ensp; $reply[3] <br>
				Posted on: &ensp; $reply[5] </p><br>
				</div>
				</td>
				</tr>
				";
			}
			echo "</table></center></span><br>";
		}
	}
?>
</center>
</body>
</html>