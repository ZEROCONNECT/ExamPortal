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
	<script>
	
	
	setInterval(function () {
		
if(document.hasFocus())
{
	
}
else
{
	
	af();
}
}, 1000);


</script>
<?php

include 'config.php';

//echo session_id();

if(isset($_GET['id']))
{
	
	$idd=$_GET['id'];
	$sql6= "select username,online from user where id=$idd;";
$result6 = $conn-> query($sql6);
while ($row1 = $result6-> fetch_assoc())
{
	$username=$row1['username'];
	$online=$row1['online'];
	if($online=='f')
	{
		echo("<script>window.location='exam1.php'</script>");
	}
	
}
}
if(isset($_GET['omrname']))
    {
    $omrname = $_GET['omrname'];
	
    }
else
{
	$omrname="";
}

if(isset($_GET['suba']))
{
	
	$suba=$_GET['suba'];

	$sql8= "update $omrname set subject='$suba' where id=$idd;";
$result8 = $conn-> query($sql8);

}
else
{
	$suba='all';
	$sql8= "update $omrname set subject='all' where id=$idd;";
$result8 = $conn-> query($sql8);

}

if(isset($_GET['quesname']))
    {
    $quesname = $_GET['quesname'];
	$sql12= "select examname,date,time,hour,minute from exam where quesname='$quesname';";
	$result12 = $conn-> query($sql12);
	while ($row1 = $result12-> fetch_assoc())
	{
		$examname=$row1['examname'];
		$date1=$row1['date'];
		$time1=$row1['time'];
		$hour=$row1['hour'];
		$minute=$row1['minute'];
		
	}

    }
else
{
	$quesname="";
}
$result90 = $conn-> query("select count(*) from $quesname");
				while ($row = $result90-> fetch_assoc())
				{
					$tq=$row['count(*)'];
				}
if(isset($_POST['one']))
    {
    $one = $_POST['one']+0;
    }
	else
	{
		$one=0;
	}

if(isset($_POST['sandn']))
    {
    $sandn = 5;
    }
	else
	{
		$sandn=0;
	}
if(isset($_POST['sandr']))
    {
    $sandr = 6;
    }
	else
	{
		$sandr=0;
	}
if(isset($_POST["nex1"]))
{
	$result = $conn-> query("update $omrname set qs1=0 where id=$idd;");
}
if($one>0 and $sandn==5)
{
	
	$an = $one.$sandn;
	$an = (int)$an;
	$result = $conn-> query("update $omrname set qs1='".$an."' where id=$idd;");
	echo"<script> sandn(1,5);</script>";
	if($tq==1)
	{
		echo"<script>window.location=\"index.php?id=$idd&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname\"</script>";
	}else
	{
		echo"<script>window.location=\"quiz.php?id=2&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname\"</script>";
	}
	
	if($result===True)
	{
		
	}
	else
	{
		echo mysqli_error($conn);
	}
}
elseif($one>0 and $sandr==6)
{

	$an = $one.$sandr;
	$an = (int)$an;
	$result = $conn-> query("update $omrname set qs1='".$an."' where id=$idd;");
	echo"<script> sandr(1,2);</script>";
	if($tq==1)
	{
			echo"<script>window.location=\"index.php?id=$idd&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname\"</script>";
	}else
	{
			echo"<script>window.location=\"quiz.php?id=2&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname\"</script>";
	}

	if($result===True)
	{
		
	}
	else
	{
		echo mysqli_error($conn);
	}
}

$answer= $conn-> query("SELECT qs1 from $omrname where id=$idd");
$row = $answer-> fetch_assoc();
$oid=$row['qs1'];
if($oid>0)
{	

	$oid=(int)($oid/10)+0;
	
}
else{
	$oid==0;
}
$result = $conn-> query("SELECT id,qsno,subject,qtype,question,optionA,optionB,optionC,optionD,ans,hint,quesimg,opimgA,opimgB,opimgC,opimgD from $quesname where id=1");
if ($result-> num_rows > 0)
{
	while ($row = $result-> fetch_assoc())
	{
		$id=$row['id'];
		$qsno=$row['qsno'];
		$question=$row['question'];
		$subject=$row['subject'];
		$qtype=$row['qtype'];
		$optionA=$row['optionA'];
		$optionB=$row['optionB'];
		$optionC=$row['optionC'];
		$optionD=$row['optionD'];
		$ans=$row['ans'];
		$hint=$row['hint'];
		$quesimg=$row['quesimg'];
		$opimgA=$row['opimgA'];
		$opimgB=$row['opimgB'];
		$opimgC=$row['opimgC'];
		$opimgD=$row['opimgD'];
		
	}
		
}
?>

<nav>
<div class="logo">
<a href='#'><img width="50" height="50" class="logo12" style='float:left' src="Capture.jpg" alt="Italian Trulli"></a>
<?php echo "<p id=\"demo33\" style=\"float:left; color:Black;margin-left:10px;margin-top:10px;font-size:20px;\">$examname</p><br><br>"; 
	?>
</div>


<?php
//echo"<input type=\"button\" id=\"top2\" value=\"$examname\"/>";
$a = "Hello_$username";
//echo"<input type=\"button\" style='color:black;border:none;background-color:transparent;margin-top:-40px;text-align:center;margin-left:40%;float:right;' id=\"top199\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" value='profile'><i class=\"fa fa-home\"></i>";
echo"<button style='color:black;border:none;background-color:transparent;margin-top:-55px;text-align:center;margin-left:40%;float:right;' class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" id='profile'><i id='profile1' class=\"fa fa-user\" style='font-size:45px;'></i></button>";
?>
	<div id="overlay">
		<div id="text">
			<p class="rull" style="text-align:center;">PLEASE READ THE RULES CAREFULLY!!</p>
			<p class="rul">	1> DON'T LOGOUT FROM EXAM UNTIL YOU HAVE FINISHED!</br>
				2> DON'T TRY TO OPEN NEW TAB OR SWITCH TAB OR COPY THE URL!</br>
				3> YOU CAN TRY TO CHECK WHAT WILL HAPPEN IF YOU TRY TO CLICK OUT OF EXAM PAGE!</br>
				NOW IT WILL ONLY SHOW WARNING,BUT</br>
				4>WHEN EXAM STARTS IT WILL COUNT AND IT WON'T GIVE YOU WARNING</br>
				5> IF IT STILL DETECTS SUSPECIOUS ACTIVITY YOU WILL BE LOGOUT AND MARKED SUSPECIOUS</br>
				6> TAKE THIS EXAM AS A STEPPING STONE FOR YOUR EXAM PREPARATION!</br>
				7> AT THE END YOU WILL GET YOUR SCORE</br>
				</p>
				<p style="color:black;"><b>ENJOY!</b></p>
		</div>
		<button onclick="off()" style="padding:5px;background-color:#4CAF50;border:0px; border-radius:7px;padding-left:15px;padding-right:15px;color:white;text-align:center;float:right;">CLOSE</button>
	</div>
	<div id="overlay1">
		<div id="text">
			<p style="text-align:center;font-size:20px;">Question Paper</p>
				<?php
				
				
				
				
				
				
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='physics'");
					echo"<p style='font-size:15px;text-align:center;'>PHYSICS</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
						$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='chemistry'");
					echo"<p style='font-size:15px;text-align:center;'>CHEMISTRY</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='Bio'");
					echo"<p style='font-size:15px;text-align:center;'>Bio</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='math'");
					echo"<p style='font-size:15px;text-align:center;'>MATHS</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							 $name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
						
				
				?>
		</div>
		<button onclick="off1()" style="padding:5px;background-color:#4CAF50;border:0px; border-radius:7px;padding-left:15px;padding-right:15px;color:white;text-align:center;float:right;">CLOSE</button>
	</div>
	
<ul class = "dropdown-menu" role = "menu">
      
      <li><button onclick="on()" style="color:black;background-color:white;float:left;border:0px;">RULES</button></li></br>
      <li><button onclick="on1()" style="color:black;background-color:white;float:left;border:0px;">Question Paper</button></li></br>
	 <?php echo"<li><a href = \"exam1.php?id=$idd\" style=\"color:black;background-color:white;float:left;\">Logout</a></li>"; ?>
      
   </ul>
</div>


<div class="top">
<?php
//echo"<input type=\"button\" id=\"top2\" value=\"$examname\"/>";

echo"<input type=\"button\" style='color:black;' id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" value=$username>";
?>
	<div id="overlay">
		<div id="text">
			<p class="rull" style="text-align:center;">PLEASE READ THE RULES CAREFULLY!!</p>
			<p class="rul">	1> DON'T LOGOUT FROM EXAM UNTIL YOU HAVE FINISHED!</br>
				2> DON'T TRY TO OPEN NEW TAB OR SWITCH TAB OR COPY THE URL!</br>
				3> YOU CAN TRY TO CHECK WHAT WILL HAPPEN IF YOU TRY TO CLICK OUT OF EXAM PAGE!</br>
				NOW IT WILL ONLY SHOW WARNING,BUT</br>
				4>WHEN EXAM STARTS IT WILL COUNT AND IT WON'T GIVE YOU WARNING</br>
				5> IF IT STILL DETECTS SUSPECIOUS ACTIVITY YOU WILL BE LOGOUT AND MARKED SUSPECIOUS</br>
				6> TAKE THIS EXAM AS A STEPPING STONE FOR YOUR EXAM PREPARATION!</br>
				7> AT THE END YOU WILL GET YOUR SCORE</br>
				</p>
				<p style="color:black;"><b>ENJOY!</b></p>
		</div>
		<button onclick="off()" style="padding:5px;background-color:#4CAF50;border:0px; border-radius:7px;padding-left:15px;padding-right:15px;color:white;text-align:center;float:right;">CLOSE</button>
	</div>
	<div id="overlay1">
		<div id="text">
			<p style="text-align:center;font-size:20px;">Question Paper</p>
				<?php

				
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='physics'");
					echo"<p style='font-size:15px;text-align:center;'>PHYSICS</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
						$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='chemistry'");
					echo"<p style='font-size:15px;text-align:center;'>CHEMISTRY</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='Bio'");
					echo"<p style='font-size:15px;text-align:center;'>Bio</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
					$result11 = $conn-> query("select id,quesimg, question from $quesname where subject='math'");
					echo"<p style='font-size:15px;text-align:center;'>MATHS</p>";
					while ($row = $result11-> fetch_assoc())
					{
						$qno= $row['id'];
						$question1= $row['question'];
						
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<p style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							 $name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
						else
						{
							echo "<p id='idk' style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
							$name="$examname$subject$qno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
							
						}
					}
						
				
				?>
		</div>
		<button onclick="off1()" style="padding:5px;background-color:#4CAF50;border:0px; border-radius:7px;padding-left:15px;padding-right:15px;color:white;text-align:center;float:right;">CLOSE</button>
	</div>
	
<ul class = "dropdown-menu" role = "menu">
      
      <li><button onclick="on()" style="color:black;background-color:white;float:right;border:0px;">RULES</button></li></br>
      <li><button onclick="on1()" style="color:black;background-color:white;float:right;border:0px;">Question Paper</button></li></br>
	 <?php echo"<li><a href = \"exam1.php?id=$idd\" style=\"color:black;background-color:white;float:right;\">Logout</a></li>"; ?>
      
   </ul>

<span id="side1" style="font-size:30px;cursor:pointer;color:black;margin-left:100px;" onclick="openNav()">&#9776;</span></div>





<div id="mySidenav" class="sidenav" style='font-family:Candara'>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a><?php
  $username=ucfirst($username);
  echo"<p style='font-size:17px;color:white;text-align:center;line-height:10px;margin-top:35px;'></p>";
echo"<p style='font-size:25px;color:white;text-align:center;line-height:10px;font-family:'Courier New';>HeY! $username</p>";
?></a>
  <!--<a><p style='font-size:15px;color:white;text-align:center;line-height:none;'><button onclick="on1()" style="color:white;background-color:transparent;border:0px;">Question Paper</button></p></a> -->
  <a><p style='font-size:15px;color:white;text-align:center;line-height:none;'><button onclick="on()" style="color:white;background-color:transparent;border:0px;">Rules</button></p></a>
	
<p style='font-size:15px;color:white;text-align:center;line-height:none;'><a href = "exam1.php?id=<?php echo $idd ?>" style="color:white;background-color:transparent;border:0px;top:0;">Logout</a></p>
<hr style="  border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);"
>
  <a><div id="omr1">
  
	<div class="subject">
	
		<?php
		
		if($suba=='all'){
		echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black;background-color:green;'>ALL</button></a>";
		echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p' class='ans' style='color:Black'>PHY</button></a>";
		echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b' class='ans' style='color:Black'>BIO</button></a>";
		echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c' class='ans' style='color:Black'>CHEM</button></a>";
		echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m' class='ans' style='color:Black;'>MATH</button></a>";
		
		}
		else if($suba=='physics')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
		echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p' class='ans' style='color:Black;background-color:green;'>PHY</button></a>";
		echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b' class='ans' style='color:Black'>BIO</button></a>";
		echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c' class='ans' style='color:Black'>CHEM</button></a>";
		echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m' class='ans' style='color:Black;'>MATH</button></a>";
		}
		else if($suba=='chemistry')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
		echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p' class='ans' style='color:Black;'>PHY</button></a>";
		echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b' class='ans' style='color:Black'>BIO</button></a>";
		echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c' class='ans' style='color:Black;background-color:green;'>CHEM</button></a>";
		echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m' class='ans' style='color:Black;'>MATH</button></a>";
		
		}
		else if($suba=='Bio')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
		echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p' class='ans' style='color:Black;'>PHY</button></a>";
		echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b' class='ans' style='color:Black;background-color:green;'>BIO</button></a>";
		echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c' class='ans' style='color:Black;'>CHEM</button></a>";
		echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m' class='ans' style='color:Black;'>MATH</button></a>";
		}
		else if($suba=='math')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
			echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p' class='ans' style='color:Black;'>PHYSICS</button></a>";
			echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b' class='ans' style='color:Black;'>BIO</button></a>";
			echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c' class='ans' style='color:Black;'>CHEMISTRY</button></a>";
			echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m' class='ans' style='color:Black;'>MATH</button></a>";

		}
		$sql9= "select count(*) from $quesname where subject='physics';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$pp=$row1['count(*)'];
		}
		$sql9= "select count(*) from $quesname where subject='Bio';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$bb=$row1['count(*)'];
		}
		$sql9= "select count(*) from $quesname where subject='chemistry';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$cc=$row1['count(*)'];
		}
		$sql9= "select count(*) from $quesname where subject='math';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$mm=$row1['count(*)'];
		}
		echo"<script>
		if($pp==0)
		{
			document.getElementById('p').style.display='none';
		}
		if($cc==0)
		{
			document.getElementById('c').style.display='none';
		}
		if($bb==0)
		{
			document.getElementById('b').style.display='none';
		}
		if($mm==0)
		{
			document.getElementById('m').style.display='none';
		}
		</script>";
		
		?>
	</div>
	
	<?php
		echo "<div id = \"show2\"></div>
	
		<script type=\"text/javascript\">
			$(document).ready(function(){

			$('#show2').load('data.php?id=$idd&omrname=$omrname&quesname=$quesname')

		});
		</script>";
		
	?>
	
		
	
	</div>
</a>
<a><div class='lowerside1'style="position:fixed;width:100%;height:100px;background-color:white;bottom:0;padding:10px;padding-bottom:0px;">

<p>
	<button id ='all' class='ans11' style='color:Black;border:2px solid black;'>1</button>Marked
	<button id ='all' class='notans1' style='color:Black;margin-left:20px;border:2px solid black;'>1</button>UnMarked <br>
	<button id ='all' class='rev1' style='color:Black;margin-left:50px;border:2px solid black;'>1</button>Review
</p>
</div></a>
  
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

<div class="timer">
	<div class='timer1'>
	<p id="demo" style="text-align:center; color:rgb(128,0,128);margin-right:10px;margin-top:10px;" ></p>
	
	<div class="top">



	</div>
	
<script>
var omrname='<?php echo $omrname ;?>';
var quesname='<?php echo $quesname ;?>';
var idd='<?php echo $idd ;?>';
var date2='<?php echo $date1 ;?>';
var time2='<?php echo $time1 ;?>';
var hour='<?php echo $hour ;?>';
var minute='<?php echo $minute ;?>';
var time3= time2.slice(3,);
var time3 = parseInt(time3)
var time4= time2.slice(0,2);
var time4 = parseInt(time4);
var time3 = parseInt(time3);
console.log('1',time4,time3);
console.log('2',time4,time3);

console.log('3',time4,time3);
rtime=time4+":"+time3;
console.log(date2,rtime);
// Set the date we're counting down to
var countDownDate = new Date(date2+" "+rtime);
countDownDate.setHours(countDownDate.getHours() + parseInt(hour));
countDownDate.setMinutes(countDownDate.getMinutes() + parseInt(minute) + 5);
console.log(countDownDate);
countDownDate = countDownDate.getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
	alert("EXPIRED");
	
	window.location="finish.php?id="+idd+"&omrname="+omrname+"&quesname="+quesname;
  }
}, 1000);
</script>
</div>
<div class ="questions">
	<div class="ques1" style='background-color:transparent;border:0px;'>
	<?php 
	$opA="$examname$subject$qsno"."optionA.jpg";
	
	//echo"<script>alert('$opA');</script>";
	$fileA="profile-pic/$opA";
	//echo($opA);
	$opB="$examname$subject$qsno"."optionB.jpg";
	$fileB="profile-pic/$opB";
	$opC="$examname$subject$qsno"."optionC.jpg";
	$fileC="profile-pic/$opC";
	$opD="$examname$subject$qsno"."optionD.jpg";
	$fileD="profile-pic/$opD";
	?>
		<div class="q">
			<?php $row = $result-> fetch_assoc();
				echo "Question No.".$qsno;
				echo"</br>";
				if($question=="NULL")
				{
					
                     //echo '<img src="data:image/jpeg;base64,'.base64_encode($quesimg).'" height="200" width="200" class="img-thumnail" />';  
					
							  
							  $name="$examname$subject$qsno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img id='img11' src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
				}
				else{
					echo "<span id='idk' style='color:orangered;'>$question</span>";
					$name="$examname$subject$qsno"."ques.jpg";
								//echo $name;
								$file="profile-pic/$name";
							if(file_exists($file))
							{
						//echo('yes');
						echo("<img id='img11' src=$file height='100' width='auto'>");
							}
							else
							{
								//echo('no');
							}
				}
					
			?>
		</div>
		<form method="post"> 
		<div class="op" >
		 
			<?php 
				if($optionA=="NULL")
					{
				if ($oid==1){
					
						echo"<input type='radio' class='op1' name='one' checked value=\"1\" onclick='myop();'/><img src=$fileA height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"2\" onclick='myop();'/><img src=$fileB height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"3\" onclick='myop();'/><img src=$fileC height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"4\" onclick='myop();'/><img src=$fileD height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
					
					}
				
				if ($oid==2){
						echo"<input type='radio' class='op1' name='one'  value=\"1\" onclick='myop();'/><img src=$fileA height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one' checked value=\"2\" onclick='myop();'/><img src=$fileB height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"3\" onclick='myop();'/><img src=$fileC height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"4\" onclick='myop();'/><img src=$fileD height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
				}
				if ($oid==3){
						echo"<input type='radio' class='op1' name='one'  value=\"1\" onclick='myop();'/><img src=$fileA height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"2\" onclick='myop();'/><img src=$fileB height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one' checked value=\"3\" onclick='myop();'/><img src=$fileC height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"4\" onclick='myop();'/><img src=$fileD height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
				}
				if ($oid==4){
						echo"<input type='radio' class='op1' name='one'  value=\"1\" onclick='myop();'/><img src=$fileA height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"2\" onclick='myop();'/><img src=$fileB height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"3\" onclick='myop();'/><img src=$fileC height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one' checked value=\"4\" onclick='myop();'/><img src=$fileD height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
				}
				if ($oid==0)
				{
					
						echo"<input type='radio' class='op1' name='one'  value=\"1\" onclick='myop();'/><img src=$fileA height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"2\" onclick='myop();'/><img src=$fileB height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"3\" onclick='myop();'/><img src=$fileC height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
						echo"<input type='radio' class='op1' name='one'  value=\"4\" onclick='myop();'/><img src=$fileD height=\"50\" width=\"100\" class=\"img-thumnail\" /><br></br>";
				
				}
				}
				else{
					if ($oid==1){
				echo"<input type='radio' class='op1' name='one' checked value=\"1\" onclick='myop();'/>$optionA<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"2\" onclick='myop();'/>$optionB<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"3\" onclick='myop();'/>$optionC<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"4\" onclick='myop();'/>$optionD<br></br>";
				}
				if ($oid==2){
				echo"<input type='radio' class='op1' name='one' value=\"1\" onclick='myop();'/>$optionA<br></br>";
				echo"<input type='radio' class='op1' name='one' checked value=\"2\" onclick='myop();'/>$optionB<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"3\" onclick='myop();'/>$optionC<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"4\" onclick='myop();'/>$optionD<br></br>";
				}
				if ($oid==3){
				echo"<input type='radio' class='op1' name='one' value=\"1\" onclick='myop();'/>$optionA<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"2\" onclick='myop();'/>$optionB<br></br>";
				echo"<input type='radio' class='op1' name='one' checked value=\"3\" onclick='myop();'/>$optionC<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"4\" onclick='myop();'/>$optionD<br></br>";
				}
				if ($oid==4){
				echo"<input type='radio' class='op1' name='one' value=\"1\" onclick='myop();'/>$optionA<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"2\" onclick='myop();'/>$optionB<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"3\" onclick='myop();'/>$optionC<br></br>";
				echo"<input type='radio' class='op1' name='one'checked value=\"4\" onclick='myop();'/>$optionD<br></br>";
				}
				if ($oid==0)
				{
					
				echo"<input type='radio' class='op1' name='one' value=\"1\" onclick='myop();'/>$optionA<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"2\" onclick='myop();'/>$optionB<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"3\" onclick='myop();'/>$optionC<br></br>";
				echo"<input type='radio' class='op1' name='one' value=\"4\" onclick='myop();'/>$optionD<br></br>";
				
				}
				}
				echo"</br>";
			?>
				
			
		
	
		<div class="tail"> 
			<div class='lefttail'>
				
				<?php 
				$result99 = $conn-> query("select qs1 from $omrname where id=$idd");
				
				
				while ($row = $result99-> fetch_assoc())
				{
					$r=$row['qs1'];
				}
				if($r==0)
				{
					if($tq==1)
					{
						echo"<a href=index.php?id=$idd&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname><input name=\"nex\" type=\"button\" id =\"next\" class=\"next\" value=\"Mark\" onclick='chtoum();'/></a>"; 
						
					}
					else{
						echo"<a href=quiz.php?id=2&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname><input name=\"nex\" type=\"button\" id =\"next\" class=\"next\" value=\"NEXT\" onclick='chtoum();'/></a>"; 
					}
					
				}
				else
				{
					
					echo"<a href=index.php?id=$idd&suba=$suba&omrname=$omrname&quesname=$quesname><input type='submit' name=\"nex1\" type=\"button\" id =\"unmark\" class=\"next\" value=\"UNMARK\" onclick='chtom();'/></a>"; 
				}
				if($tq==1)
				{
					echo "<a href='finish.php?id=$idd&omrname=$omrname&quesname=$quesname'><input name=\"pre\" type=\"button\" id ='prev' style=\" background-color: RED;width:80px;text-align:left;padding-left:15px;\" class='next' value='SUBMIT' /></a>";
				}
				
				?>
			</div>
			<div class="righttail">
			<?php 
			if($tq==1)
			{
				
				echo"<input type=\"submit\" name=\"sandn\" id =\"sn\" class=\"sn\" value=\"Save\" />";
				echo"<input type=\"submit\" name=\"sandr\" id =\"sr\" class=\"sr\" value=\"Save & Review\" />";
				
			}
			
			else
			{
				
				echo"<input type=\"submit\" name=\"sandn\" id =\"sn\" class=\"sn\" value=\"Save & Next\" />";
				echo"<input type=\"submit\" name=\"sandr\" id =\"sr\" class=\"sr\" value=\"Save & Review\" />";
				
			}
			?>
				
			</div>
		</div>
		</form>
		</div>
		
	</div>
	<div class="omr" style='background-color:transparent;border:0px;'>
	<div class="subject">
	
		<?php
		
		
		if($suba=='all'){
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black;background-color:green;'>ALL</button></a>";
			echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p1' class='ans' style='color:Black'>PHYSICS</button></a>";
			echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b1' class='ans' style='color:Black'>BIO</button></a>";
			echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c1' class='ans' style='color:Black'>CHEMISTRY</button></a>";
			echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m1' class='ans' style='color:Black'>MATH</button></a>";
		}
		else if($suba=='physics')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
			echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p1' class='ans' style='color:Black;background-color:green;'>PHYSICS</button></a>";
			echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b1' class='ans' style='color:Black'>BIO</button></a>";
			echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c1' class='ans' style='color:Black'>CHEMISTRY</button></a>";
			echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m1' class='ans' style='color:Black'>MATH</button></a>";

		}
		else if($suba=='chemistry')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all'class='ans' style='color:Black'>ALL</button></a>";
			echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p1' class='ans' style='color:Black;'>PHYSICS</button></a>";
			echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b1' class='ans' style='color:Black'>BIO</button></a>";
			echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c1' class='ans' style='color:Black;background-color:green;'>CHEMISTRY</button></a>";
			echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m1' class='ans' style='color:Black'>MATH</button></a>";

		}
		else if($suba=='Bio')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
			echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p1' class='ans' style='color:Black;'>PHYSICS</button></a>";
			echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b1' class='ans' style='color:Black;background-color:green;'>BIO</button></a>";
			echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c1' class='ans' style='color:Black;'>CHEMISTRY</button></a>";
			echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m1' class='ans' style='color:Black'>MATH</button></a>";

		}
		else if($suba=='math')
		{
			echo"<a href='index.php?&suba=all&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='all' class='ans' style='color:Black'>ALL</button></a>";
			echo"<a href='index.php?&suba=physics&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='p1' class='ans' style='color:Black;'>PHYSICS</button></a>";
			echo"<a href='index.php?&suba=Bio&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='b1' class='ans' style='color:Black;'>BIO</button></a>";
			echo"<a href='index.php?&suba=chemistry&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='c1' class='ans' style='color:Black;'>CHEMISTRY</button></a>";
			echo"<a href='index.php?&suba=math&id=$idd&omrname=$omrname&quesname=$quesname'><button id ='m1' class='ans' style='color:Black;background-color:green;'>MATH</button></a>";

		}
		$sql9= "select count(*) from $quesname where subject='physics';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$pp=$row1['count(*)'];
		}
		$sql9= "select count(*) from $quesname where subject='Bio';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$bb=$row1['count(*)'];
		}
		$sql9= "select count(*) from $quesname where subject='chemistry';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$cc=$row1['count(*)'];
		}
		$sql9= "select count(*) from $quesname where subject='math';";
		$result9 = $conn-> query($sql9);
		while ($row1 = $result9-> fetch_assoc())
		{
			$mm=$row1['count(*)'];
		}
		echo"<script>
		if($pp==0)
		{
			document.getElementById('p1').style.display='none';
		}
		if($cc==0)
		{
			document.getElementById('c1').style.display='none';
		}
		if($bb==0)
		{
			document.getElementById('b1').style.display='none';
		}
		if($mm==0)
		{
			document.getElementById('m1').style.display='none';
		}
		</script>";
		?>
	</div>
	<script>

	</script>
	<?php
		echo "<div id = \"show\"></div>
	
		<script type=\"text/javascript\">
			$(document).ready(function(){

			$('#show').load('data.php?id=$idd&omrname=$omrname&quesname=$quesname')

		});
		</script>";
		
	?>
	 
	</div>
</div>


</body>
</html>