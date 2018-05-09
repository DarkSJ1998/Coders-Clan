<?php
	session_start();
?>
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
	//height: 5%;
	padding: 20px;
	width:90%;
	word-wrap: break-word;
	text-align:left;
	display: inline-block;
}
p
{
	font-family: Segoe UI;
}
</style>
<script>
function go()
{
	<?php
		$_SESSION['title'] = $row[1];
		echo "alert ('" . $_SESSION['title'] , "');";
		//echo "alert('hello " . $row[1] . ");";
	?>
}
</script>

</head>
<body background="sources/carbon2.jpg">
<marquee style="background:#b70e0e;font-family:Supercell;color:white;" behavior="alternate"> Tutorials </marquee>
<center>
<?php
	include ('connection.php');
	
	$query = "SELECT * FROM `thread` WHERE `type` = 'Article' ORDER BY `timestamp` DESC";
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
			<div>
			<a href='show_tutorial.php?tutorial=$row[0]'><h5>$row[1]</h5></a>
			<p style='float:left;'> " . " &ensp; </p>
			<p style='float:right;'>Posted by: &ensp; $row[3] <br>
			Posted on: $row[6]</p>
			</div>
			</td>
			</tr>
			";
		}
		echo "</table></center></span>";
	}
?>
</center>
</body>
</html>