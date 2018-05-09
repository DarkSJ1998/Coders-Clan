<?php
	session_start();
?>
<?php
	include('connection.php');
	$user_id = $_POST['uid'];
	$password = $_POST['pass'];

	$query1 = "SELECT * FROM `admin` WHERE `name` = '$user_id' AND `password` = '$password'";
	$result1 = $connection->query($query1);
	
	$query2 = "SELECT * FROM `user` WHERE `user_id` = '$user_id' AND `user_password` = '$password'";
	$result2 = $connection->query($query2);
	
	if ($result1->num_rows<=0 && $result2->num_rows<=0 )
	{
		header("location: /coders%20clan/login_failed.html");
		die;
	}
	if ($result1->num_rows>0)
	{
		$row = $result1->fetch_row();
		echo "<script> alert('Welcome Moderator : ". $row[1] . "'); </script>";
		
		$_SESSION['signedin'] = 1;
		$_SESSION['user'] = $row[1];
		$_SESSION['name'] = $row[1];
		echo "<script> window.location.assign('index_admin.html'); </script>";
		die;
	}
	if ($result2->num_rows>0)
	{
		$row = $result2->fetch_row();
		echo "<script> alert('Login successful as : ".$user_id."!'); </script>";
		
		$_SESSION['signedin'] = 1;
		$_SESSION['user'] = $user_id;
		$_SESSION['name'] = $row[3];
		echo "<script> window.location.assign('index_user.html'); </script>";
		die;
	}
	$_SESSION['signedin'] = 0;
?>