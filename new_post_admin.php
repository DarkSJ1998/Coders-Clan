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
<form action = "push_thread.php" method = "POST">
<fieldset>
<legend>
<h2 style="font-family:Supercell;color:white;"> create a thread </h2>
</legend>
<p style="font-family:Supercell;color:white;">
Title : <input type="text" name = "title" style = "width:500px;" required>
<br><br>
type : <select name="type" style = "width:500px;" required>
				<option value = ""> Choose </option>
				<option value="Question"> Question </option>
				<option value="Article"> Article </option>
		</select>
<br><br>
language : <select name="language" style = "width:500px;" required>
				<option value = ""> Choose </option>
				<option value="C"> C </option>
				<option value="C++"> C++ </option>
				<option value="General"> General </option>
			</select>
<br><br>
Thread Content : <br><br>
<xmp style='font-family:Segoe UI;color:white;'>
Please enclose any syntax data in <xmp style='font-family:Segoe UI;color:white;'> <code></code></xmp> tags.</span> 
<br><br>
<textarea name="data" rows="30" cols="90" placeholder="Hello World!" required>
</textarea>
<br><br>
<button type="submit">create</button>
</p>
</fieldset>
</form>
</center>
</body>
</html>