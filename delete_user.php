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
	$id = $_SESSION['id'];
	
	include ('connection.php');
	
	$check = "SELECT * FROM `user` WHERE `user_id` = '$id'";
	$result = $connection->query($check);
	if($result->num_rows == 1)
	{
		$query = "DELETE FROM `user` WHERE `user_id` = '$id'";
		if($connection->query($query) === TRUE)
		{
			$_SESSION['name'] = $uname;
			echo "<script> alert('Account Deleted successfully. We''ll miss you :('); </script>";
			$_SESSION['signedin'] = 0;
			$_SESSION['user'] = -1;
			//$_SESSION['name'] = $row[3];
			echo "<script> window.location.assign('index.html'); </script>";
			die;
		}
		else
		{
			echo "Deleting account failed :- <br>".mysqli_error($connection);
			die;
		}
	}
	else
	{
		echo "Incorrect password entered <br>";
		die;
	}
?>

</h3>
</center>
</body>
</html>