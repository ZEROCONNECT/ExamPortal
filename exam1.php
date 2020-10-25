<html>
<head>
<link rel="stylesheet" href="style.css">
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script type="text/javascript" id="MathJax-script" async
	src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
	</script>
</head>

<body>
<script type="text/javascript">
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	
function preback(){
window.history.forward();
}
setTimeout("preback()",0);
window.onunload=function(){null};
</script>
<?php
include 'config.php';
if(isset($_GET['id']))
{
	$idd=$_GET['id'];
}
else
{
	$idd="";
}
if($idd!="")
{
	$sql0= " update user set online='n' where id=$idd; ";
	$result0 = $conn-> query($sql0);
	echo("<script>window.location='exam1.php'</script>");
}
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
if(isset($_POST['examname']))
    {
    $examname = $_POST['examname'];

    }
else
{
	$examname="";
}
if($one!="" and $one1!="" and $examname!="")
{
	
	$result11 = $conn-> query("select omrname,quesname from exam where examname='$examname';");
	while ($row = $result11-> fetch_assoc())
				{
					$omrname=$row['omrname'];
					$quesname=$row['quesname'];
				}
	$sql8= " select id,online from user where username='$one' and password='$one1'; ";
	$result8 = $conn-> query($sql8);
	if ($result8-> num_rows > 0)
		{
			while ($row = $result8-> fetch_assoc())
				{
					$id=$row['id'];
					$online=$row['online'];
				}
			
			if ($online=='n')
			{
				$sql7= " update user set online='y' where id=$id; ";
				$result7 = $conn-> query($sql7);
				$result5 = $conn-> query("insert into $omrname(id) value($id)");
				echo"<script> window.location='rules1.php?id=$id&omrname=$omrname&quesname=$quesname'</script>";
			}
			if ($online=='y')
			{
				echo "<script>alert('user already logged in');</script>";
			}
			
			else
			{
				echo "<script>alert('user already finished the exam');</script>";
			
			}
		}
		else
		{
			echo"<script>alert('Invalid details')</script>";
		}
	
}


?>

<nav>

<div class="logo">
<img width="50" height="50" class="logo12" style='float:right' src="Capture.jpg" alt="Italian Trulli">

</div>


</div>






</nav>

<div class ="questions1">
	<div class="ques11"style='margin-left:250px;background:transparent;border:0px;'>
	
		<form method="post"> 
		<div class="op" style='margin:auto;'>
			<p style="text-align:left;font-size:20px;">Enter Your Credentials</p>
			<?php 
				
				echo"<input type='text' class='op1' name='one' style='border:1px solid black;border-radius:2px;' placeholder='USERNAME'/><br><br>";
				echo"<input type='password' class='op1' style='border:1px solid black;border-radius:2px;' name='one1'placeholder='PASSWORD'/><br><br>";
				
				
			?><select name = 'examname'>
				
				<?php
					$result1 = $conn-> query("select examname from exam;");
					while($row = mysqli_fetch_assoc($result1))  
                        {
                        $examname = $row["examname"];
                        echo "<option value='$examname'>$examname</option>";
                        }
					?>
                </select>
				
	
				<input type="submit" name="sandn" id ="sn" class="sn" value="TAKE THE TEST" />

		</div>
		</form>
		</div>
	</div>
	
	
	</div>
</div>
 <!--<div id="footer">@Powered by PRASHNOTTAR</div>-->
</body>
</html>