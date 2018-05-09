<?php
session_start()
?>
<html>
<head>
<style>
@font-face
{
	font-family:Supercell;
	src: url('sources/Supercell-magic-webfont.ttf')
}
button
{
	font-family:Supercell;
	color:white;
	border: 3px solid white;
	padding: 15px 32px;
	display: inline-block;
	background-color: #FF0000;
}
</style>
</head>
<body background="sources/carbon2.jpg">
<center><br>
<form action = "update_thread.php" method = "POST">
<fieldset>
<legend>
<h2 style="font-family:Supercell;color:white;"> Edit your thread </h2>
</legend>
<p style="font-family:Supercell;color:white;">
<?php
	$_SESSION['tid'] = $_GET['id'];
	$tid = $_SESSION['tid'];
	include("connection.php");
	$query = "SELECT * FROM `thread` WHERE `thread_id` = '$tid'";
	$result = $connection->query($query);
	if($result->num_rows > 0)
	{
		$row=mysqli_fetch_row($result);
		echo "
		Title : <input type='text' name = 'title' style = 'width:500px;' value = " . $row[1] . " required>
		<br><br>
		type : <select name='type' style = 'width:500px;' required>
						<option value = " . $row[2] . "> " . $row[2] . " </option>
				</select>
		<br><br>
		language : <select name='language' style = 'width:500px;' required>
						<option value = " . $row[4] . "> " . $row[4] . " </option>
					</select>
		<br><br>
		Thread Content : <br><br>
		<xmp style='font-family:Segoe UI;color:white;'> You can use usual HTML formatting tags such as <b>,<i>,<u> etc.
		Please enclose any syntax data in <xmp> </xmp> tags.</xmp> 
		<br><br>";

		echo "<br><textarea name='data' rows='30' cols='90' required>" . $row[5] . " </textarea>";
	}
?>
<br><br>
<button type="submit">update</button>
</p>
</fieldset>
</form>
</center>
</body>
</html>