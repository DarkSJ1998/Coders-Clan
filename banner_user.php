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
<body background="sources/banner-bg.png" style="background-position:bottom;">
<a href="home.html" target="body">
<img src="sources/final-logo.png" height="90%" style="margin-left:8%;">
</a>

<a href = "index.html" target = "_top">
<h3 style="font-family:Supercell;color:#FFDF00;float:right;height:30%;"> Logout </h3>
</a>
<h4 style="font-family:Supercell;color:white;float:right;height:30%;"> (logged in as <?php echo $_SESSION['name']." <".$_SESSION['user'].">"; ?> )&nbsp</h4>
</body>
</html>