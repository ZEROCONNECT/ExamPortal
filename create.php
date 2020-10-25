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

if(isset($_POST['date']))
    {
    $date = $_POST['date'];
	
    }
else
{
	$date="";
}if(isset($_POST['time']))
    {
    $time = $_POST['time'];
	
    }
else
{
	$time="";
}

if(isset($_POST['etype']))
    {
    $etype = $_POST['etype'];
	
    }
else
{
	$etype="";
}
if(isset($_POST['noques']))
    {
    $noques = $_POST['noques'];
	
    }
else
{
	$noques="";
}
if(isset($_POST['qphysics']))
    {
    $qphysics = $_POST['qphysics'];
	
    }
else
{
	$qphysics="";
}
if(isset($_POST['qchemistry']))
    {
    $qchemistry = $_POST['qchemistry'];
	
    }
else
{
	$qchemistry="";
}
if(isset($_POST['qmath']))
    {
    $qmath = $_POST['qmath'];
	
    }
else
{
	$qmath="";
}
if(isset($_POST['qBio']))
    {
    $qBio = $_POST['qBio'];
	
    }
else
{
	$qBio="";
}
if(isset($_POST['classes9']))
    {
    $classes9 = 1;
	
    }
else
{
	$classes9=0;
}
if(isset($_POST['classes10']))
    {
    $classes10 = 1;
	
    }
else
{
	$classes10=0;
}
if(isset($_POST['classes11']))
    {
    $classes11 = 1;
	
    }
else
{
	$classes11=0;
}
if(isset($_POST['classes12']))
    {
    $classes9 = 1;
	
    }
else
{
	$classes12=0;
}
if(isset($_POST['hour']))
    {
    $hour = $_POST['hour'];
	
    }
else
{
	$hour=0;
}
if(isset($_POST['minute']))
    {
    $minute = $_POST['minute'];
	
    }
else
{
	$minute=0;
}
if($one!="" and $date!="" and $time!="" and $etype!="" and $noques!="" and $qphysics!="" and $qchemistry!="" and $qBio!="" and  $qmath!="")
{
	
	$etype = strtolower($etype);
	$omr=$one."_omr";
	$ques=$one."_ques";
	
	$sql= " insert into exam(examname, date, time,omrname,quesname,etype,noques,qphysics,qchemistry,qBio,qmath,classes9,classes10,classes11,classes12,hour,minute) values('$one', '$date', '$time', '$omr', '$ques', '$etype',$noques,$qphysics,$qchemistry,$qBio,$qmath,$classes9,$classes10,$classes11,$classes12,$hour,$minute); ";
	$result = $conn-> query($sql);
	if ($result === True )
		{
			//echo"<script>alert('successfull')</script>";
			$result1 = $conn-> query("create table $ques(id int auto_increment, qsno int, subject varchar(30), qtype varchar(1) default 'm', optionA varchar(30) default NULL, optionB varchar(30) default NULL, optionC varchar(30) default NULL, optionD varchar(30)default NULL, ans int, hint varchar(30) default 'Not Available', question varchar(300)default NULL,quesimg longblob default NULL,opimgA longblob default NULL, opimgB longblob default NULL, opimgC longblob default NULL, opimgD longblob default NULL, primary key(id));");
			if($result1===True)
			{
				echo'<script>alert("Successfull")</script>';
			}
		else
		{
			echo mysqli_error($conn);
		}
			$result1 = $conn-> query("create table $omr(id int auto_increment,subject varchar(30) default 'all',marks int default 0, primary key(id));");
			
				for ($i=1; $i<=$noques;$i++)
			{
				$result2 = $conn-> query("alter table $omr add column qs$i int default 0;");
			}
			
		}
		else
		{
			echo mysqli_error($conn);
			
		}
	
}

	

?>

<nav>
<div class="logo">
<img width="70" height="50" class="logo12"src="as.jpg" alt="Italian Trulli"></div>



</nav>

<div class ="questions1">
	
	
		<form method="post"> 
		<div class="op4" style='margin-left:20px;margin-top:20px;'>
			<p style="text-align:left;font-size:20px;">Create Exam Details</p>
			<?php 
				
				echo"<input type='text' class='op1' name='one' style='border:1px solid black;border-radius:2px;' placeholder='examname'size='25'/><br><br>";
				echo"<input type='date' class='op1' name='date' style='border:1px solid black;border-radius:2px;' placeholder='Date'/><br>";
				echo"<input type='time' class='op1' name='time' style='border:1px solid black;border-radius:2px;' placeholder='Time'/><br>";
				echo"<input type='radio' class='op1' id='classes9' name='classes9' style='border:1px solid black;border-radius:2px;' value='9'/>9	&nbsp;";
				echo"<input type='radio' class='op1' id='classes10'name='classes10' style='border:1px solid black;border-radius:2px;' value='10'/>10	&nbsp;";
				echo"<input type='radio' class='op1' id='classes11'name='classes11' style='border:1px solid black;border-radius:2px;' value='11'/>11	&nbsp;";
				echo"<input type='radio' class='op1' id='classes12'name='classes12' style='border:1px solid black;border-radius:2px;' value='12'/>12	&nbsp;";
				echo"<input type='button' class='sn' id='sn' value='clear' style='background-color:blue;'onclick='clear1();'/><br>";
				
				echo"<input type='hidden' class='op1' name='etype' style='border:1px solid black;border-radius:2px;' value='pcm'/>";
//''''''''''''''''''''''''
				echo"<input type='text' class='op1' name='hour' style='border:1px solid black;border-radius:2px;width:40px;' placeholder='Hour'/>:";
				echo"<input type='text' class='op1' name='minute' style='border:1px solid black;border-radius:2px;width:40px;' placeholder='Minute'/><br>";
				//''''''''''''''''''''''''
				echo"<input type='text' class='op1' name='noques' style='border:1px solid black;border-radius:2px;margin-top:3px;' placeholder='total no. of ques'/><br>";
				echo"<input type='text' class='op1' name='qphysics' style='border:1px solid black;border-radius:2px;' placeholder='No. of question in physics'/><br>";
				echo"<input type='text' class='op1' name='qchemistry' style='border:1px solid black;border-radius:2px;' placeholder='No. of question in chemistry'/><br>";
				echo"<input type='text' class='op1' name='qBio' style='border:1px solid black;border-radius:2px;' placeholder='No. of question in Bio'/><br>";
				echo"<input type='text' class='op1' name='qmath' style='border:1px solid black;border-radius:2px;' placeholder='No. of question in Maths'/><br>";
				
				
				
			?>
				<script>
var grd = function(){
  $("input[type='radio']").click(function() {
    var previousValue = $(this).attr('previousValue');
    var name = $(this).attr('name');

    if (previousValue == 'checked') {
      $(this).removeAttr('checked');
      $(this).attr('previousValue', false);
    } else {
      $("input[name="+name+"]:radio").attr('previousValue', false);
      $(this).attr('previousValue', 'checked');
    }
  });
};

grd('1');
				</script>
	
				<input type="submit" name="sandn" id ="sn" class="sn" value="Create" />

		</div>
		</form>
		
	</div>
	
	
	</div>
</div>

</body>
</html>