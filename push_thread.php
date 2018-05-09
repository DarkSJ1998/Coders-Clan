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
	border: 3px solid white;
	border-collapse: collapse;
	padding: 10px;
}
</style>
</head>
<body background="sources/carbon2.jpg">
<center><br>
<h3 style="font-family:Supercell;color:white;">

<?php
	$title = $_POST['title'];
	$type = $_POST['type'];
	$postedby = $_SESSION['user'];
	$language = $_POST['language'];
	$data = (string)$_POST['data'];
	
	include ('connection.php');
	
	$data = str_replace("'","''",$data);
	$check = "SELECT *FROM `thread` WHERE `title` = '$title'";
	$result = $connection->query($check);
	if($result->num_rows == 0)
	{
		$query = "INSERT INTO `thread` (`title`, `type`, `postedby`, `language`, `data`) VALUES ('$title','$type','$postedby','$language','<pre>$data</pre>')";
		if($connection->query($query) === TRUE)
		{
			echo "Post successful";
			if($type == "Question")
				echo "<br><a href='threads.php'> Go to Threads </a>";
			else
				echo "<br><a href='tutorials.php'> Go to Tutorials </a>";
			die;
		}
		else
		{
			echo "Post unsuccessful :- <br>".mysqli_error($connection);
			die;
		}
	}
	else
	{
		echo "Thread already exists :-<br><br>";
		echo 
		"<span style='font-family:Segoe UI;color:white;'>
		<table width = 90%>
		<tr>
			<th>Thread Title</th>
			<th>Type</th>
			<th>Posted by</th>
		</tr>";
		while ($row=mysqli_fetch_row($result))
		{
			echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
		}
		echo "</table></span>";
		die;
	}
?>

</h3>
</center>
</body>
</html>