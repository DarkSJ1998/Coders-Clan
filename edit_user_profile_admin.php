<?php
	session_start();
?>
<!DOCTYPE html>
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
	//border-collapse: collapse;
	padding: 10px;
	margin-top: 3%;
	margin-left: 3%;
	margin-right: 3%;
}
a:link
{ color:white; }
a:visited
{ color:white; }
a:hover
{ color:white;background-color: black; }
a:active
{ color:yellow; }
h5,h2
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
	width:90%;
	//word-wrap: break-word;
	text-align:left;
	display: inline-block;
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
.button:hover
{
	background-color: black;
}
</style>
<script>
var txt = document.getElementById('status');
function checkTel()
{
	var tel = document.getElementById('ph_no').value;
	if(tel > 9999999999 || tel < 1000000000 || isNaN(tel))
	{
		document.getElementById('status').innerHTML = '*Invalid Phone number.';
		document.getElementById('sub').style.visibility = 'hidden';
	}
	else
	{
		document.getElementById('status').innerHTML = '';
		document.getElementById('sub').style.visibility = 'visible';
	}
}
function pwd()
{
	var pwd2 = document.getElementById('pwd2').value;
	var pwd3 = document.getElementById('pwd3').value;
	if(pwd2 != pwd3)
	{
		alert("Entered passwords don't match");
		document.getElementById('sub').style.visibility = 'hidden';
	}
	else
	{
		document.getElementById('sub').style.visibility = 'visible';
	}
	checkTel();
}
</script>
</head>
<body background="sources/carbon2.jpg">
<center>
<?php
	include ('connection.php');
	$user = $_SESSION['user'];
	$query1 = "SELECT * FROM `admin` WHERE `name` = '$user'";
	$result1 = $connection->query($query1);
	$query2 = "SELECT * FROM `user` WHERE `user_id` = '$user'";
	$result2 = $connection->query($query2);
	if($result1->num_rows == 0 && $result2->num_rows == 0)
	{
		echo "
		<img src='sources/shield-icon.png' height='60%'>
		<h2 style='font-family:Supercell;color:white;'> Some error occurred! <br>" . mysqli_error($connection) . "</h2>
		";
	}
	else if($result1->num_rows > 0)
	{
		$row=mysqli_fetch_row($result1);
		$_SESSION['id'] = $row[0];
		echo
			"<br>
			<div>
			<form method = 'POST' action='update_user_profile_admin.php'>
			<p align='right'>
			<button class = 'button' type='submit' id='sub'>Update Details</button>
			</p>
				<table width = 90%>
					<tr>
						<th style='width:50%;'>
							<center><h2 style='font-family:Supercell;color:white;'> User Profile : </h2></center>
						</th>
						<th style='width:50%;'>
							<center><input type='text' style='font-family:Supercell;' name = 'uname' value = '$row[1]' required></center>
						</th>
					</tr>
					<tr>
						<td rowspan=5>
							<h2> Change password:- <h2><h3>
							<center><p style='font-family:Georgia;'>
								Current Password :- &ensp;&ensp;&ensp;&ensp;&ensp;
								<input type='password' style='font-family:Georgia;width:40%;' name = 'pwd1' onchange='pwd()' required><br><br>
								New Password :- &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
								<input type='password' style='font-family:Georgia;width:40%;' name = 'pwd2' id='pwd2' onchange='pwd()'><br><br>
								Confirm New Password :- &ensp;
								<input type='password' style='font-family:Georgia;width:40%;' name = 'pwd3' id='pwd3' onchange='pwd()'><br><br>
								</p>
							</center></h3>
						</td>
						<td>
							<h3 style='font-family:Georgia;'>Admin ID : # $row[0] &ensp;(generated automatically) </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Email ID : <input type='text' style='font-family:Georgia;width:70%;' name = 'email' value = '$row[3]' required> </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Contact No : <input type='text' style='font-family:Georgia;width:70%;' id = 'ph_no' name = 'ph_no' value = '$row[4]' onchange = 'checkTel()' required> </h3>
							<p style = 'color:white;' id = 'status'> </p>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Profession : <input type='text' style='font-family:Georgia;width:70%;' name = 'profession' value = '$row[5]' required> </h3>
						</td>
					</tr>
					<tr>
						<td>
							<h3 style='font-family:Georgia;'>Department : <input type='text' style='font-family:Georgia;width:70%;' name = 'dept' value = '$row[6]' required> </h3>
						</td>
					</tr>
				</table>
				<br></form>
			</div><br>
			";
	}
?>

</center>
</body>
</html>