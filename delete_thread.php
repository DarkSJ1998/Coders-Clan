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

</style>
</head>
<body>
<?php
	include ('connection.php');
	//$thread_id = $_GET['id'];
	$tid = $_SESSION['tid'];
	$del = "DELETE FROM `thread` WHERE `thread_id` = '$tid'";
	$result = $connection->query($del);
	
	if($connection->$result === TRUE)
		echo "Deleted successfully.";
	else
		echo mysqli_error($connection);
	
?>
</body>
</html>