<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>
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
<div class="menu" id="head">
	<div class="logo">
	<img src="Capture.jpg" alt="Italian Trulli">
	</div>
	<div class="middle">
	<h3>USEFULL LINKS</h3>
		<div class="submenu1">
			<ul>
				<li><a href="#">Introduction</a></li>
				<li><a href="#">Refrence</a></li>
			
			</ul>
	
		</div>
	</div>
	<div class="right">
	<h3>User Name</h3>
		<div class="submenu2">
		<ul>
			<li><a href="#">LOGOUT</a></li>
		</ul>
		</div>
	</div>
</div>
<div class="timer">
	<h2> timer <h2>
</div>
<div class ="questions">
	<div class="ques1">
		<div class="q">
			
		</div>
		<div class="op">
		</div>
	</div>
	<div class="tail"> 
	</div>
	<div class="omr">
	<?php
		$j=0;
		for($i=1; $i<=5;$i++)
		{
			if($j==4)
			{
				$j=0;
				echo"</br>";
			}
			$j++;
			echo "<a href=ques.php?q=$i><button>$i</button></a>";
		}
	?>
	</div>
</div>
<div class="lower">
	<div class="hint">
	</div>
	<div class="detail">
	</div>
</div>

</body>
</html>