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
if(isset($_GET['id']))
    {
    $id = $_GET['id'];
	
    }


if(isset($_POST['one1']))
    {
    $one1 = $_POST['one1'];

    }
else
{
	$one1="";
}
if(isset($_POST['examname']))
    {
    $examname = $_POST['examname'];

    }
else
{
	$examname="";
}
if(isset($_POST['subject']))
    {
    $subject = $_POST['subject'];
	
    }
else
{
	$subject="";
}
echo ($subject.$examname);
if($examname!="" and $one1!="" and $subject!="")
{
	
	$sql8= " select id from teacher where tpass='$one1'; ";
	$result8 = $conn-> query($sql8);
	if ($result8-> num_rows > 0)
		{
			while($row = $result8-> fetch_assoc())
			{
				$id=$row['id'];
			}
			
			echo"<script> window.location='paper.php?id=$id&examname=$examname&subject=$subject'</script>";
		}
		else
		{
			echo"<script>alert('invalid details')</script>";
		}
	
}

$sql6= "select tname from teacher where id=$id;";
$result6 = $conn-> query($sql6);
while ($row1 = $result6-> fetch_assoc())
{
	$username=$row1['tname'];
}
?>

<nav>
<div class="logo">
<img width="50" height="50" class="logo12"src="Capture.jpg" alt="Italian Trulli"></div>
<span id="side1" style="font-size:30px;cursor:pointer;color:blue;" onclick="openNav()" style="color:black;">&#9776;</span></div>
<div class="top9">

<?php
echo"<input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" style='color:black;'value=$username>";
?>
<ul class = "dropdown-menu" role = "menu">
	<?php echo"<li><a href = \"rules.php?id=$id\" style=\"color:black;background-color:white;float:right;\">Back</a></li>" ?></br>
      <li><a href = "exam.php" style="color:black;background-color:white;float:right;">Logout</a></li>
     
      
   </ul>



	
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color:blue;">&times;</a>
  <a><?php
echo"<p style='font-size:30px;color:white;text-align:center;line-height:140px;'>$username</p>";
?></a>  
<p style='font-size:30px;color:white;text-align:center;line-height:none;'><a href = "exam.php" style="color:white;background-color:transparent;border:0px;top:0;">Logout</a></p>

  </div>
  <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "70%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</nav>






<div class ="questions1">
	
	
		<form method="post"> 
		<div class="op4" style='margin-left:20px;margin-top:20px;'>
			<p style="text-align:left;font-size:20px;">QUESTION PAPER</p>
			<select name = 'examname'>
				
				<?php
					$result1 = $conn-> query("select examname from exam;");
					while($row = mysqli_fetch_assoc($result1))  
                        {
                        $examname = $row["examname"];
                        echo "<option value='$examname'>$examname</option>";
                        }
					?>
                </select>
				<select name = 'subject'>
				<option value='physics'>physics</option>
				<option value='Bio'>Biology</option>
		<option value='math'>maths</option>
				<option value='chemistry'>chemistry</option>
				
                </select>
			<?php 
				
				
				echo"<br><br><input type='password' class='op1' style='border:1px solid black;border-radius:2px;' name='one1'placeholder='TPASSWORD'/><br>";
				
				
			?>
				
	
				<input type="submit" name="sandn" id ="sn" class="sn" value="START" />

		</div>
		</form>
	</div>
	
	
	
	</div>
</div>

</body>
</html>