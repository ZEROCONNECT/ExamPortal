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
</head>

<script>
	alert("YOU HAVE SUBMITED ALL THE ANSWERS");

</script>


<?php
include 'config.php';

if(isset($_GET['id']))
{
	
	$idd=$_GET['id'];

}	
if(isset($_GET['omrname']))
    {
    $omrname = $_GET['omrname'];
	
    }
else
{
	$omrname="";
}
if(isset($_GET['quesname']))
    {
    $quesname = $_GET['quesname'];
	$sql12= "select examname,date,time from exam where quesname='$quesname';";
	$result12 = $conn-> query($sql12);
	while ($row1 = $result12-> fetch_assoc())
	{
		$examname=$row1['examname'];
		$date1=$row1['date'];
		$time1=$row1['time'];
	}

	
    }
else
{
	$quesname="";
}
	
	$sql6= "select username from user where id=$idd;";
$result6 = $conn-> query($sql6);
while ($row1 = $result6-> fetch_assoc())
{
	$username=$row1['username'];
}
$sql99= "update user set online='f' where username=$username";
$result99 = $conn-> query($sql6);
		$sql3 = "select count(*) from $quesname;";
		$sql4 = "select ans from $quesname;";
		$result1 = $conn-> query($sql3);
		$result2 = $conn-> query($sql4);
		$result = $conn-> query("SELECT ans from $quesname where id=1");
		$result5 = $conn-> query("update user set online='f' where id=$idd ");
		while ($row = $result1-> fetch_assoc())
			{
				$k=$row['count(*)'];
				
			}

		$array =array();
		$array1 =array();
		while ($row = $result2-> fetch_assoc())
		{
			$array[]=$row['ans'];
			
		}
		
		$sql = "select * from $omrname where id=$idd; ";
	
		$result = $conn-> query($sql);
		while ($row = $result-> fetch_assoc())
		{
			for($i=1;$i<=$k;$i++ )
			{	
				$c=$row["qs$i"];
				if ($c>=0)
				{
					$a=(int)($c/10);
					$array1[]=$a;
					
				}
			}
		}
		
		$score=0;
		for($i=0;$i<$k;$i++)
		{
			if($array[$i]==$array1[$i])
			{
				$score=$score+2;
			}
			else{
				
				$score=$score-0;
			}
			
		}
		
		$result11 = $conn-> query("update $omrname set marks=$score where id=$idd;");
		if ($result11===True)
		{
			
		}
		else
		{
			echo mysqli_error($conn);
		}
		
?>
<nav>
<div class="logo">
<img width="50" height="50" class="logo12"src="Capture.jpg" alt="Italian Trulli"></div>
<span id="side1" style="font-size:30px;cursor:pointer;color:blue;" onclick="openNav()" >&#9776;</span></div>
<div class="top">

<?php

//echo"<input type=\"button\" id=\"top2\" value=\"$examname\"/>";
//echo"<a href='exam1.php'><input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" style='color:black;margin-right:10px;'value=Logout></a>";
//echo"<input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" value=$username>";
?>
<ul class = "dropdown-menu" role = "menu">
      <li><a href = "exam1.php" style="color:black;background-color:white;float:right;">Logout</a></li>
      
   </ul>



	
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
  <a><?php
  echo"$username=ucfirst($username)";
echo"<p style='font-size:30px;color:white;text-align:center;line-height:140px;'>HeY! $username</p>";

?>
<hr style="  border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);">
</a>

<!--<a><p style='font-size:30px;color:white;text-align:center;line-height:none;'><button onclick="on1()" style="color:white;background-color:transparent;border:0px;">Solutions</button></br></p></a>-->
	 
<p style='font-size:30px;color:white;text-align:center;line-height:none;'><a href = "exam1.php" style="color:white;background-color:transparent;border:0px;top:0;">Logout</a></p>

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
<div id="overlay1">
		<div id="text">
			<p style="text-align:center;font-size:20px;">Solutions</p>
				<?php
					$result11 = $conn-> query("select id,qsno,question,quesimg,ans,optionA,optionB,optionC,optionD,opimgA,opimgB,opimgC,opimgD from $quesname");
					$i=0;
					
					while ($row = $result11-> fetch_assoc())
					{
						
						$abc=$array1[$i];
						
						$qno= $row['id'];
						$qno1=$row['qsno'];
						$ans=$row['ans'];
						if($abc==0)
						{
							$abc='No response Recorded';
							$abd='None';
						}
						else if($abc==1)
						{
							$abc='A';
							$abc1='optionA';
							$abd='opimgA';
														
						}
						else if($abc==2)
						{
							$abc='B';
							$abc1='optionB';
							$abd='opimgB';
						}
						else if($abc==3)
						{
							$abc='C';
							$abc1='optionC';
							$abd='opimgC';
						}
						else if($abc==4)
						{
							$abc='D';
							$abc1='optionD';
							$abd='opimgD';
						}
						if($ans==1)
						{
							$ans='A';
							$ab='opimgA';
							$aa='optionA';
						}
						else if($ans==2)
						{
							$ans='B';
							$aa='optionB';
							$ab='opimgB';
							
						}
						else if($ans==3)
						{
							$ans='C';
							$aa='optionC';
							$ab='opimgC';
							
						}
						else if($ans==4)
						{
							$ans='D';
							$aa='optionD';
							$ab='opimgD';
							
						}
						$question1= $row['question'];
						$quesimg= $row['quesimg'];
						if($question1=="NULL")
						{
							echo "<br><p style='font-size:12px;text-align:left;color:orange'>Q.$qno:</p>";
							
							
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
						else
						{
							echo "<p style='font-size:12px;text-align:left;color:orange'>Q.$qno: $question1</br></p>";
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
						
						if($row["$aa"]=="NULL")
						{
							
							$abcd=$row["$ab"];
							
							  echo '<p style=\'font-size:10px;text-align:left;\'>Correct ANSWERS='.$ans.':<img src="data:image/jpeg;base64,'.base64_encode($abcd).'" height="auto" width="auto" class="img-thumnail" style="float:none;" /></p></br>'; 
							if($abd=='None')
							{
								echo "<p style='font-size:10px;text-align:left;'>No response Recorded</br></p>";
							}
							else
							{
								$abcd1=$row["$abd"];
							
							//&nbsp Your ans=$abc 
								echo '<p style=\'font-size:10px;text-align:left;\'>Your Response='.$abc.':<img src="data:image/jpeg;base64,'.base64_encode($abcd1).'" height="auto" width="auto" class="img-thumnail" style="float:none;" /></p></br>';
							}
						}
						
						
						else
						{
						
							$abcd=$row["$aa"];
							$abcd1=$row["$abc1"];
							echo "<p style='font-size:10px;text-align:left;'>correct answer=$ans:&nbsp$abcd</br></p>";
							echo "<p style='font-size:10px;text-align:left;'>your response=$abc:&nbsp$abcd1</br></p>";
						}
						
						$i++;
					}
					
						
				
				?>
				
		</div>
		<button onclick="off1()" style="padding:5px;background-color:#4CAF50;border:0px; border-radius:7px;padding-left:15px;padding-right:15px;color:white;text-align:center;float:right;">CLOSE</button>
	</div>
<?php $total=$k*4?>


<p style="text-align:center;font-size:20px;color:rgb(128,0,128);">YOUR SCORE OUT OF <?php echo"$total"?></p>
<div class="quizz" style='color:rgb(128,0,128);'>
<?php 
	
	echo $score;
	echo"<br><p style='font-size:20px; color:black' >Thank You</p>";
?>
</div>


</body>

</html>