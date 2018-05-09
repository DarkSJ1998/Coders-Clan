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
<body background="sources/carbon2.jpg">
<center><br>
<h2 style="font-family:Supercell;color:white;">

<?php
	include('connection.php');
	$user_id = $_POST['uid'];
	$password = $_POST['pass'];
	$email = $_POST['email'];
	$name = $_POST['uname'];
	$batch = $_POST['batch'];
	$section = $_POST['section'];
	$ph_no = $_POST['ph_no'];
	
	$query1 = "SELECT * FROM `admin` WHERE `name` = '$user_id' OR `emailid` = '$email' OR `ph_no` = '$ph_no'";
	$result1 = $connection->query($query1);
	
	$query2 = "SELECT * FROM `user` WHERE `user_id` = '$user_id' OR `email_id` = '$email' OR `ph_no` = '$ph_no'";
	$result2 = $connection->query($query2);
	
	if ($result1->num_rows<=0 && $result2->num_rows<=0 )
	{
		$push = "INSERT INTO `user` (`user_id`, `user_password`, `email_id`, `name`, `batch`, `section`, `ph_no`) VALUES ('$user_id','$password','$email','$name','$batch','$section','$ph_no')";
		
		if($connection->query($push) === TRUE)
			echo "Registration Successfull!";
		else
			echo "Some error occurred : ".mysqli_error($connection);
		die;
	}
	else
	{
		echo "User already exists.";
		echo "<br> <a href='login.html' target='body'><img src='sources/login-cropped.png'></a>";
	}
?>

</h2>
</center>
</body>
</html>