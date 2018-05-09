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
	$rtitle = $_POST['rtitle'];
	$tid = $_SESSION['tid'];
	$postedby = $_SESSION['user'];
	$type = $_SESSION['type'];
	$rdata = (string)$_POST['rdata'];
	
	include ('connection.php');
	
	$rdata = str_replace("'","''",$rdata);
	$query = "INSERT INTO `replies` (`rtitle`, `thread_id`, `postedby`, `data`) VALUES ('$rtitle','$tid','$postedby','<pre>$rdata</pre>')";
	if($connection->query($query) === TRUE)
	{
		echo "Reply successful";
		if($type == "Question")
			echo "<br><a href='show_thread.php?thread=$tid'> Go to the Thread </a>";
		else
			echo "<br><a href='show_tutorial.php?tutorial=$tid'> Go to The Tutorial </a>";
		die;
	}
	
	else
	{
		echo "Reply unsuccessful :- <br>".mysqli_error($connection);
		die;
	}
?>

</h3>
</center>
</body>
</html>