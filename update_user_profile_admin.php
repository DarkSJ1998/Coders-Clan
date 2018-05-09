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
	$uname = $_POST['uname'];
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];
	$pwd3 = $_POST['pwd3'];
	$email = $_POST['email'];
	$ph_no = $_POST['ph_no'];
	$profession = $_POST['profession'];
	$dept = $_POST['dept'];
	
	include ('connection.php');
	if($pwd3 == '')
		$pwd3 = $pwd1;
	
	$check = "SELECT * FROM `admin` WHERE `id` = '$id' AND `password` = '$pwd1'";
	$result = $connection->query($check);
	if($result->num_rows == 1)
	{
		$query = "UPDATE `admin` SET `name` = '$uname', `password` = '$pwd3', `emailid` = '$email', `ph_no` = '$ph_no', `profession` = '$profession', `dept` = '$dept' WHERE `id` = '$id'";
		if($connection->query($query) === TRUE)
		{
			echo "Update successful";
			echo "<br><a href='user_profile_admin.php'> Go to Profile </a>";
			$_SESSION['user'] = $uname;
			echo "<script> alert('Please reload the page for the changes to take effect'); </script>";
		}
		else
		{
			echo "Updating info failed :- <br>".mysqli_error($connection);
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