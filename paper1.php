<html>
<head>
	<link rel="stylesheet" href="styleb.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="javas.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async
          src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js">
  </script>
  
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

if(isset($_GET['examname']))
    {
    $examname = $_GET['examname'];
	
    }
else
{
	$examname="NULL";
}
if(isset($_GET['subject']))
    {
    $subject = $_GET['subject'];
	
    }
else
{
	$subject="";
}


if(isset($_POST['questext']))
    {
    $questext = $_POST['questext'];
	htmlentities($_POST['questext']);
	$questext='$$'.$questext.'$$';
	$questext=str_replace(" ","\ ",$questext);
	$questext=addslashes($questext);
	
	
    }
else
{
	$questext="";
	
}

if(isset($_POST['one']))
    {
    $one = $_POST['one'];
	htmlentities($_POST['one']);
	$one='$$'.$one.'$$';
	$one=str_replace(" ","\ ",$one);
	$one=addslashes($one);
    }
else
{
	$one="";
}

if(isset($_POST['two']))
    {
    $two = $_POST['two'];
	htmlentities($_POST['two']);
	$two='$$'.$two.'$$';
	$two=str_replace(" ","\ ",$two);
	$two=addslashes($two);
	
    }
else
{
	$two="";
}
if(isset($_POST['three']))
    {
    $three = $_POST['three'];
	htmlentities($_POST['three']);
	$three='$$'.$three.'$$';
	$three=str_replace(" ","\ ",$three);
	$three=addslashes($three);
    }
else
{
	$three="";
}
if(isset($_POST['four']))
    {
    $four = $_POST['four'];
	htmlentities($_POST['four']);
	$four='$$'.$four.'$$';
	$four=str_replace(" ","\ ",$four);
	$four=addslashes($four);
    }
else
{
	$four=NULL;
}
if(isset($_POST['correct']))
    {
    $correct = $_POST['correct'];
	
    }
else
{
	$correct="";
}
if(isset($_POST['qno']))
    {
    $qno = $_POST['qno'];
	
    }
else
{
	$qno="";
}


if(isset($_POST['hint']))
    {
    $hint = $_POST['hint'];
	htmlentities($_POST['hint']);
    }
else
{
	$hint="";
}
if(isset($_POST["insert"]))
{
		$result9 = $conn-> query(" select quesname from exam where examname='$examname';");
		while($row = mysqli_fetch_assoc($result9))  
		{
			$quesname = $row["quesname"];
        
		}
		if($questext=="")
		{
			$file= addslashes(file_get_contents($_FILES["quesimg"]["tmp_name"]));
			
			$questext="NULL";
		}
		else
		{
			$file="NULL";
		}
		if($one=="")
		{
			$file1= addslashes(file_get_contents($_FILES["opimgA"]["tmp_name"]));
			$one="NULL";
		}
		else
		{
			$file1="NULL";
		}
		if($two=="")
		{
			$file2= addslashes(file_get_contents($_FILES["opimgB"]["tmp_name"]));
			$two="NULL";
		}
		else
		{
			$file2="NULL";
		}
		if($three=="")
		{
			$file3= addslashes(file_get_contents($_FILES["opimgC"]["tmp_name"]));
			$three="NULL";
		}
		else
		{
			$file3="NULL";
		}
		if($four=="")
		{
			$file4= addslashes(file_get_contents($_FILES["opimgD"]["tmp_name"]));
			$four="NULL";
		}
		else
		{
			$file4="NULL";
		}
		
		$query = "insert into $quesname(qsno,subject,quesimg,opimgA,opimgB,opimgC,opimgD,ans,question,optionA,optionB,optionC,optionD,hint) value($qno,'$subject','$file','$file1','$file2','$file3','$file4',$correct,'$questext','$one','$two','$three','$four','$hint');";
		
		if(mysqli_query($conn, $query))
    {
        echo"<script>alert('successful')</script>";
    }
	else
	{
		echo mysqli_error($conn);
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
<span id="side1" style="font-size:30px;cursor:pointer;color:blue;" onclick="openNav()" >&#9776;</span></div>
<div class="top9">

<?php
echo"<input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" style='color:black;'value=$username>";
?>
<ul class = "dropdown-menu" role = "menu">
	<?php echo"<li><a href = \"rules.php?id=$id\" style=\"color:black;background-color:white;float:right;\">Back</a></li>" ?></br>
      <li><button onclick="on1()" style="color:black;background-color:white;float:right;border:0px;">Question Paper</button></li></br>
		<li><a href = <?php echo"rules.php?id=$id"; ?> style="color:black;background-color:white;float:right;">back</a></li>
	  <li><a href = "exam.php" style="color:black;background-color:white;float:right;">Logout</a></li>
      
   </ul>



	
</div>




<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
  <a><?php
echo"<p style='font-size:30px;color:white;text-align:center;line-height:140px;'>$username</p>";
?></a>

<a><p style='font-size:30px;color:white;text-align:center;line-height:none;'><button onclick="on1()" style="color:white;background-color:transparent;border:0px;">Question Paper</button></br></p></a>
	<p style='font-size:30px;color:white;text-align:center;line-height:none;'><a href = <?php echo"rules.php?id=$id"; ?> style="color:white;background-color:transparent;border:0px;top:0;">Back</a></p>  
<p style='font-size:30px;color:white;text-align:center;line-height:none;'><a href = "exam.php" style="color:white;background-color:transparent;border:0px;top:0;">Logout</a></p>

  </div>
</nav>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "70%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<script>
      $('.icon').click(function(){
        $('span').toggleClass("cancel");
      });
    </script>

<div class ="questions1">
	<?php
					$result1 = $conn-> query(" select q$subject,quesname from exam where examname='$examname';");
					while($row = mysqli_fetch_assoc($result1))  
                        {
                        $qsubject = $row["q$subject"];
						$quesname = $row["quesname"];
                        }
						
						$result2 = $conn-> query(" select count(*) from $quesname where subject='$subject';");
					while($row = mysqli_fetch_assoc($result2))  
                        {
                        $noofques = $row["count(*)"];
						
                       
                        }
						$rem=$qsubject-$noofques;
						
						$qno = $noofques+1;
						$sub=strtoupper($subject);
					?>
	
		<form method="post" enctype="multipart/form-data"> 
		<div class="op4" style='margin-left:20px;margin-top:20px;'>
		
			<p style="text-align:center;font-size:20px;">Remaining questions:<?php echo($rem);?></p>
			<p style="text-align:center;font-size:18px;"><?php echo($sub);?></p>
			<?php 
			if($rem>0)
			{
			echo"<p style=\"text-align:left;font-size:14px;\">Question no:$qno</p>";

			 
				echo"<textarea class='op5' rows='3' cols='23' name='questext' style='border:1px solid black;border-radius:2px;margin-left:0px;' placeholder='question'></textarea><br><input type='file' name='quesimg' id='quesimg' /><br><button name='a' href='#' id='a'onclick='qf();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				
				echo"<input type='text' class='op1' name='one' style='border:1px solid black;border-radius:2px;' placeholder='option A'/><br><input type='file' name='opimgA' id='opimgA' />  <br><button onclick='qf1();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				echo"<input type='text' class='op1' name='two' style='border:1px solid black;border-radius:2px;' placeholder='option B'/><br><input type='file' name='opimgB' id='opimgB' /><br><button onclick='qf2();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				echo"<input type='text' class='op1' name='three' style='border:1px solid black;border-radius:2px;' placeholder='option C'/><br><input type='file' name='opimgC' id='opimgC' /><br><button onclick='qf3();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				echo"<input type='text' class='op1' name='four' style='border:1px solid black;border-radius:2px;' placeholder='option D'/><br><input type='file' name='opimgD' id='opimgD' /><br><button onclick='qf4();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				echo"<input type='text' class='op1' name='correct' style='border:1px solid black;border-radius:2px;' placeholder='correct option'/><br><br>";
				echo"<input type='text' class='op1' name='hint' style='border:1px solid black;border-radius:2px;' placeholder='hint'/><br><br>";
				echo"<input type='hidden' name='qno' value='$qno'/>";
			
			
				
	
			
			echo"<input type=\"submit\" name=\"insert\" id =\"sn\" class=\"sn\" value=\"SUBMIT\" />";
            }
            else
            {
                echo"<p style=\"text-align:left;font-size:14px;\">you have completed all the question in this section</p>";
            }?>
		</div>
		</form>
		</div>
<div id="overlay1">
		<div id="text">
			<p style="text-align:center;font-size:20px;">Question Paper</p>
				<?php
					$result11 = $conn-> query("select id,qsno,question,quesimg from $quesname where subject='$subject'");
					$sub=strtoupper($subject);
					echo"<p style='font-size:15px;text-align:center;'>$sub</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$qno1=$row['qsno'];
						$question1= $row['question'];
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							  echo '<img src="data:image/jpeg;base64,'.base64_encode($quesimg).'" height="200" width="200" class="img-thumnail" />';  
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
						}
					}
					
						
				
				?>
		</div>
		<button onclick="off1()" style="padding:5px;background-color:#4CAF50;border:0px; border-radius:7px;padding-left:15px;padding-right:15px;color:white;text-align:center;float:right;">CLOSE</button>
	</div>

		<div id="text4">
			<p style="text-align:center;font-size:20px;">Question Paper</p>
				<?php
					$result11 = $conn-> query("select id,qsno,question,quesimg from $quesname where subject='$subject'");
					$sub=strtoupper($subject);
					echo"<p style='font-size:15px;text-align:center;'>$sub</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$qno1=$row['qsno'];
						$question1= $row['question'];
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno1:</p>";
							  echo '<img src="data:image/jpeg;base64,'.base64_encode($quesimg).'" height="200" width="200" class="img-thumnail" />';  
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno1:$question1</p>";
						}
					}
					
						
				
				?>
		</div>
		
	


</body>
</html>