<?php
$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "omr";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<html>
<style>
#footer
{
	position:absolute;
	bottom:0;
	width:100%;
	height:30px;
	opacity:0.5;
	text-align:right;
	background:transparent;
}
</style>
<body>

</html>