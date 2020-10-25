<html>
<head>
<link rel="stylesheet" href="styleb.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javas.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
include 'config.php';

if(isset($_POST['one']))
    {
    $one = $_POST['one'];
	
    }
else
{
	$one="";
}

if(isset($_POST['one1']))
    {
    $one1 = $_POST['one1'];

    }
else
{
	$one1="";
}
if($one!="" and $one1!="")
{
	
	$sql8= " select id from teacher where tname='$one' and tpass='$one1'; ";
	$result8 = $conn-> query($sql8);
	if ($result8-> num_rows > 0)
		{
			while($row = $result8-> fetch_assoc())
			{
				$id=$row['id'];
			}
			
			echo"<script> window.location='rules.php?id=$id'</script>";
		}
		else
		{
			echo"<script>alert('Invalid details')</script>";
		}
	
}


?>

<nav>
<div class="logo">
<img width="50" height="50" class="logo12"src="Capture.jpg" alt="Italian Trulli"></div>








</nav>

<div class ="questions1">
	<div class="ques11" style='margin-left:350px;padding:50px;'>
	
		<form method="post"> 
		<div class="op" style='margin-left:0px' >
			<p style="text-align:left;font-size:20px;">Teacher Login</p>
			<?php 
				
				echo"<input type='text' class='op1' name='one' style='border:1px solid black;border-radius:2px;' placeholder='TUSERNAME'/><br>";
				echo"<input type='password' class='op1' style='border:1px solid black;border-radius:2px;' name='one1'placeholder='TPASSWORD'/><br>";
				
				
			?>
				
	
				<input type="submit" name="sandn" id ="sn" class="sn" value="LOGIN" />

		</div>
		</form>
		</div>
	</div>
	
	
	</div>
</div>

</body>
</html>