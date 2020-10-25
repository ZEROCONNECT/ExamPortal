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

<body>
<script type="text/javascript">

	setInterval(function () {
		
if(document.hasFocus())
{
	
}
else
{
	
	
	af1();
	
}
}, 500);

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
	
?>
<nav>
<div class="logo">
<img width="50" height="50" class="logo12"src="Capture.jpg" alt="Italian Trulli"></div>
<span id="side1" style="font-size:30px;cursor:pointer;color:blue;" onclick="openNav()" >&#9776;</span></div>
<div class="top">

<?php
echo"<input type=\"button\" id=\"top2\" style='font-size:25px;' value=\"$examname\"/>";
echo"<input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" value=$username>";
?>
<ul class = "dropdown-menu" role = "menu">
      <li><a href = "exam1.php" style="color:black;background-color:white;float:right;">Logout</a></li>
      
   </ul>



	
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
  <a><?php
echo"<p style='font-size:30px;color:white;text-align:center;line-height:70px;'>$username</p>";
?></a>


	 
<p style='font-size:20px;color:white;text-align:center;line-height:none;'><a href = "exam1.php" style="color:white;background-color:transparent;border:0px;top:0;">Logout</a></p>

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
<div class="timer">
	<p id="demo" style="text-align:center;color:rgb(128,0,128);" ></p>
<script>
// Set the date we're counting down to
var omrname='<?php echo $omrname ;?>';
var quesname='<?php echo $quesname ;?>';
var idd1='<?php echo $idd ;?>';
var date2='<?php echo $date1 ;?>';
var time2='<?php echo $time1 ;?>';
var time3= time2.slice(3,);
var time3 = parseInt(time3)
var time4= time2.slice(0,2);
var time4 = parseInt(time4);
console.log(date2,time2);
console.log(time3,time4);

rtime=time4+":"+time3;
// Set the date we're counting down to
var countDownDate = new Date(date2+" "+rtime);
countDownDate.setMinutes(countDownDate.getMinutes() +5);
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
	
	
	window.location='index.php?id='+idd1+'&omrname='+omrname+'&quesname='+quesname;
	
  }
}, 1000);
</script>
</div>



				
<div class="quizz1" style='color:Black;background-color:white;'>
</br>
</br>
</br>
<p style="text-align:center;font-size:30px;color:rgb(128,0,128);">PLEASE READ THE RULES CAREFULLY!!</p>
1> DON'T LOGOUT FROM EXAM UNTIL YOU HAVE FINISHED!</br>
2> DON'T TRY TO OPEN NEW TAB OR SWITCH TAB OR COPY THE URL!</br>
3> YOU CAN TRY TO CHECK WHAT WILL HAPPEN IF YOU TRY TO CLICK OUT OF EXAM PAGE!</br>
NOW IT WILL ONLY SHOW WARNING,BUT</br>
4>WHEN EXAM STARTS IT WILL COUNT AND IT WON'T GIVE YOU WARNING</br>
5> IF IT STILL DETECTS SUSPECIOUS ACTIVITY YOU WILL BE LOGOUT AND MARKED SUSPECIOUS</br>
6> TAKE THIS EXAM AS A STEPPING STONE FOR YOUR EXAM PREPARATION!</br>
7> AT THE END YOU WILL GET YOUR SCORE</br>
<p style="color:rgb(128,0,128);">ENJOY!</p> 
</div>
</body>

</html>