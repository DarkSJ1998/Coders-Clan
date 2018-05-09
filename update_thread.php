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
	$tid = $_SESSION['tid'];
	$type = $_POST['type'];
	$postedby = $_SESSION['user'];
	$language = $_POST['language'];
	$data = (string)$_POST['data'];
	
	include ('connection.php');
	
	$data = str_replace("'","''",$data);
	$check = "SELECT *FROM `thread` WHERE `thread_id` = '$tid'";
	$result = $connection->query($check);
	if($result->num_rows == 1)
	{
		$query = "UPDATE `thread` SET `title` = '$title', `data` = '<pre>$data</pre>' WHERE `thread_id` = '$tid'";
		if($connection->query($query) === TRUE)
		{
			echo "Update successful";
			if($type == "Question")
				echo "<br><a href='threads.php'> Go to Threads </a>";
			else
				echo "<br><a href='tutorials.php'> Go to Tutorials </a>";
			die;
		}
		else
		{
			echo "Updating the thread failed :- <br>".mysqli_error($connection);
			die;
		}
	}
?>

</h3>
</center>
</body>
</html>