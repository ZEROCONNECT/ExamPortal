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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script>
var position;
	
    function getCaretPosition() {
        var ctlTextArea = document.getElementById('textArea');
        position = ctlTextArea.selectionStart;
        return position;
    }
	
	/* Needs JQuery */
    $(document).ready(function () {

        jQuery.fn.extend({
            insertAtCaret: function (myValue) {
                return this.each(function (i) {
                    if (document.selection) {
                        //For browsers like Internet Explorer
                        this.focus();
                        sel = document.selection.createRange();
                        sel.text = myValue;
                        this.focus();
						//this.select();
                    }
                    else if (this.selectionStart || this.selectionStart == '0') {
                        //For browsers like Firefox and Webkit based
                        var startPos = this.selectionStart;
                        var endPos = this.selectionEnd;
                        var scrollTop = this.scrollTop;
                        this.value = this.value.substring(0, startPos) + myValue + this.value.substring(endPos, this.value.length);
                        this.focus();
                        this.selectionStart = startPos + myValue.length;
                        this.selectionEnd = startPos + myValue.length;
                        this.scrollTop = scrollTop;
                    } else {
                        this.value += myValue;
                        this.focus();
						//this.select();
                    }
                })
            }
        });

        $('#btnTest').click(function () {

            $("#textArea").insertAtCaret('$$  $$');
            
        });
		$('#btnTest1').click(function () {
            $("#textArea1").insertAtCaret('$$  $$');
        });
		$('#btnTest2').click(function () {
            $("#textArea2").insertAtCaret('$$  $$');
        });
		$('#btnTest3').click(function () {
            $("#textArea3").insertAtCaret('$$  $$');
        });
		$('#btnTest4').click(function () {
            $("#textArea4").insertAtCaret('$$  $$');
        });

    });
	
</script>

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


if(isset($_POST['txtMessageFields']))
    {
    $questext = $_POST['txtMessageFields'];
	htmlentities($_POST['txtMessageFields']);
	
	//$questext='$$'.$questext.'$$';
	
	$questext=addslashes($questext);
	
	
    }
else
{
	$questext="";
	
}

if(isset($_POST['txtMessageFields1']))
    {
    $one = $_POST['txtMessageFields1'];
	htmlentities($_POST['txtMessageFields1']);
	//$one='$$'.$one.'$$';
	//$one=str_replace(" ","\ ",$one);
	$one=addslashes($one);
    }
else
{
	$one="";
}

if(isset($_POST['txtMessageFields2']))
    {
    $two = $_POST['txtMessageFields2'];
	htmlentities($_POST['txtMessageFields2']);
	//$two='$$'.$two.'$$';
	//$two=str_replace(" ","\ ",$two);
	$two=addslashes($two);
	
    }
else
{
	$two="";
}
if(isset($_POST['txtMessageFields3']))
    {
    $three = $_POST['txtMessageFields3'];
	htmlentities($_POST['txtMessageFields3']);
	//$three='$$'.$three.'$$';
	//$three=str_replace(" ","\ ",$three);
	$three=addslashes($three);
    }
else
{
	$three="";
}
if(isset($_POST['txtMessageFields4']))
    {
    $four = $_POST['txtMessageFields4'];
	htmlentities($_POST['txtMessageFields4']);
	//$four='$$'.$four.'$$';
	//$four=str_replace(" ","\ ",$four);
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
			//$file= addslashes(file_get_contents($_FILES["quesimg"]["tmp_name"]));
			
			$questext="NULL";
		}
		else
		{
			$file="NULL";
		}
		if($one=="")
		{
			//$file1= addslashes(file_get_contents($_FILES["opimgA"]["tmp_name"]));
			$one="NULL";
		}
		else
		{
			$file1="NULL";
		}
		if($two=="")
		{
			//$file2= addslashes(file_get_contents($_FILES["opimgB"]["tmp_name"]));
			$two="NULL";
		}
		else
		{
			$file2="NULL";
		}
		if($three=="")
		{
			//$file3= addslashes(file_get_contents($_FILES["opimgC"]["tmp_name"]));
			$three="NULL";
		}
		else
		{
			$file3="NULL";
		}
		if($four=="")
		{
			//$file4= addslashes(file_get_contents($_FILES["opimgD"]["tmp_name"]));
			$four="NULL";
		}
		else
		{
			$file4="NULL";
		}
		
		$query = "insert into $quesname(qsno,subject,ans,question,optionA,optionB,optionC,optionD,hint) value($qno,'$subject',$correct,'$questext','$one','$two','$three','$four','$hint');";
		
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
echo"<a href='rules.php?id=$id'><input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" style='color:black;margin-right:10px;'value=Back></a>";
echo"<a href='exam.php'><input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" style='color:black;margin-right:10px;'value=Logout></a>";
//echo"<input type=\"button\" id=\"top1\" class = \"btn btn-primary dropdown-toggle\" data-toggle = \"dropdown\" style='color:black;'value=$username>";

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

				$que=$examname.$subject.$qno.'ques'.'.jpg';
				$op1=$examname.$subject.$qno.'optionA'.'.jpg';
				$op2=$examname.$subject.$qno.'optionB'.'.jpg';
				$op3=$examname.$subject.$qno.'optionC'.'.jpg';
				$op4=$examname.$subject.$qno.'optionD'.'.jpg';
				//echo($que);
				//echo"<textarea class='op5' rows='3' cols='23' name='questext' style='border:1px solid black;border-radius:2px;margin-left:0px;' placeholder='question'></textarea><br><input type='file' name='quesimg' id='quesimg' /><br><button name='a' href='#' id='a'onclick='qf();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				echo"<textarea id='textArea' name='txtMessageFields' class='required' cols='23' rows='10' onclick='getCaretPosition()' onkeyup='getCaretPosition()' style='border:1px solid black;border-radius:2px;' placeholder='Question'></textarea><br><button id='btnTest' type='button' style='background-color:lightblue;border:2px solid black;padding:2px;'>Equation</button><input type='button' onclick = 'openWin($qno,\"$examname\",\"$subject\")'value='Add Image' style='background-color:lightgreen;border:2px solid black;padding:2px;margin-left:2px;'/><input type='hidden' id='File_URL' value=\"$que\"><p id='output'></p> <button id='Check_File'style='background-color:transparent;color:red;border:none;'>X</button>   <br>";
				
				//<input type='file' name='quesimg' id='quesimg' /><br><br>";
				echo"<textarea id='textArea1' name='txtMessageFields1' class='required' cols='23' rows='2' onclick='getCaretPosition1()' onkeyup='getCaretPosition1()' style='border:1px solid black;border-radius:2px;' placeholder='option A'></textarea><br><button id='btnTest1' type='button' style='background-color:lightblue;border:2px solid black;padding:2px;'>Equation</button><input type='button' onclick = 'openWin1($qno,\"$examname\",\"$subject\")'value='Add Image' style='background-color:lightgreen;border:2px solid black;padding:2px;margin-left:2px;'/><input type='hidden' id='File_URL1' value=\"$op1\"><p id='output1'></p> <button id='Check_File1' style='background-color:transparent;color:red;border:none;'>X</button> <br>";
				echo"<textarea id='textArea2' name='txtMessageFields2' class='required' cols='23' rows='2' onclick='getCaretPosition2()' onkeyup='getCaretPosition2()' style='border:1px solid black;border-radius:2px;' placeholder='option B'></textarea><br><button id='btnTest2' type='button' style='background-color:lightblue;border:2px solid black;padding:2px;'>Equation</button><input type='button' onclick = 'openWin2($qno,\"$examname\",\"$subject\")'value='Add Image'style='background-color:lightgreen;border:2px solid black;padding:2px;margin-left:2px; '/><input type='hidden' id='File_URL2' value=\"$op2\"><p id='output2'></p> <button id='Check_File2'style='background-color:transparent;color:red;border:none;'>X</button> <br>";
				echo"<textarea id='textArea3' name='txtMessageFields3' class='required' cols='23' rows='2' onclick='getCaretPosition3()' onkeyup='getCaretPosition3()' style='border:1px solid black;border-radius:2px;' placeholder='option C'></textarea><br><button id='btnTest3' type='button' style='background-color:lightblue;border:2px solid black;padding:2px;'>Equation</button><input type='button' onclick = 'openWin3($qno,\"$examname\",\"$subject\")'value='Add Image' style='background-color:lightgreen;border:2px solid black;padding:2px;margin-left:2px;'/><input type='hidden' id='File_URL3' value=\"$op3\"><p id='output3'></p> <button id='Check_File3'style='background-color:transparent;color:red;border:none;'>X</button> <br>";
				echo"<textarea id='textArea4' name='txtMessageFields4' class='required' cols='23' rows='2' onclick='getCaretPosition4()' onkeyup='getCaretPosition4()' style='border:1px solid black;border-radius:2px;' placeholder='option D'></textarea><br><button id='btnTest4' type='button' style='background-color:lightblue;border:2px solid black;padding:2px;'>Equation</button><input type='button' onclick = 'openWin4($qno,\"$examname\",\"$subject\")'value='Add Image' style='background-color:lightgreen;border:2px solid black;padding:2px;margin-left:2px;'/><input type='hidden' id='File_URL4' value=\"$op4\"><p id='output4'></p> <button id='Check_File4'style='background-color:transparent;color:red;border:none;'>X</button> <br>";
				//echo"<input type='text' class='op1' name='one' style='border:1px solid black;border-radius:2px;' placeholder='option A'/><br><input type='file' name='opimgA' id='opimgA' />  <br><button onclick='qf1();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				//echo"<input type='text' class='op1' name='two' style='border:1px solid black;border-radius:2px;' placeholder='option B'/><br><input type='file' name='opimgB' id='opimgB' /><br><button onclick='qf2();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				//echo"<input type='text' class='op1' name='three' style='border:1px solid black;border-radius:2px;' placeholder='option C'/><br><input type='file' name='opimgC' id='opimgC' /><br><button onclick='qf3();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
				//echo"<input type='text' class='op1' name='four' style='border:1px solid black;border-radius:2px;' placeholder='option D'/><br><input type='file' name='opimgD' id='opimgD' /><br><button onclick='qf4();'style='background-color:transparent;border:0px;color:red;'>X</button><br>";
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
		<script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
    </script> 
		<script> 
        $(document).ready(function() { 
            
           setInterval(function() { 
                
                var url = $("#File_URL").val();
					url='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({ 
                        url: url, 
                        type: 'HEAD', 
                        error: function()  
                        { 
                            $("#output").text(""); 
                        }, 
                        success: function()  
                        { 
                            $("#output").text('File added'); 
                        } 
                    }); 
                } 
            },500); 
        });
		$(document).ready(function() { 
		 
            
            $("#Check_File").click(function() { 
                
                var url = $("#File_URL").val(); 
				url1='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({
                    type: 'POST',
                    url: 'set.php',
                    data: {
                        url: url1,
						
                    },
                    
                }) 
                }  
            });
			
        }); 
		//---------------------------------------------------------------------
		 $(document).ready(function() { 
            
           setInterval(function() { 
                
                var url = $("#File_URL1").val();
					url='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({ 
                        url: url, 
                        type: 'HEAD', 
                        error: function()  
                        { 
                            $("#output1").text(""); 
                        }, 
                        success: function()  
                        { 
                            $("#output1").text('File added'); 
                        } 
                    }); 
                } 
            },500); 
        });
		$(document).ready(function() { 
		 
            
            $("#Check_File1").click(function() { 
                
                var url = $("#File_URL1").val(); 
				url1='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({
                    type: 'POST',
                    url: 'set.php',
                    data: {
                        url: url1,
						
                    },
                    
                }) 
                }  
            });
			
        }); 
		//----------------------------------------
		
		
		 $(document).ready(function() { 
            
           setInterval(function() { 
                
                var url = $("#File_URL2").val();
					url='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({ 
                        url: url, 
                        type: 'HEAD', 
                        error: function()  
                        { 
                            $("#output2").text(""); 
                        }, 
                        success: function()  
                        { 
                            $("#output2").text('File added'); 
                        } 
                    }); 
                } 
            },500); 
        });
		 $(document).ready(function() { 
            
           setInterval(function() { 
                
                var url = $("#File_URL3").val();
					url='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({ 
                        url: url, 
                        type: 'HEAD', 
                        error: function()  
                        { 
                            $("#output3").text(""); 
                        }, 
                        success: function()  
                        { 
                            $("#output3").text('File added'); 
                        } 
                    }); 
                } 
            },500); 
        });
		 $(document).ready(function() { 
            
           setInterval(function() { 
                
                var url = $("#File_URL4").val();
					url='profile-pic/'+url;
                if (url != "") { 
                    $.ajax({ 
                        url: url, 
                        type: 'HEAD', 
                        error: function()  
                        { 
                            $("#output4").text(""); 
                        }, 
                        success: function()  
                        { 
                            $("#output4").text('File added'); 
                        } 
                    }); 
                } 
            },500); 
        });
    </script> 
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
							echo "<p id='idk' style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							  //echo '<img src="data:image/jpeg;base64,'.base64_encode($quesimg).'" height="200" width="200" class="img-thumnail" />';  
							  $name="$examname$subject$qno1"."ques.jpg";
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
							echo "<br><p id='idk' style='font-size:10px;text-align:left;'>Q.$qno:$question1</p>";
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
							echo "<p id='idk' style='font-size:10px;text-align:left;'>Q.$qno:</p>";
							  //echo '<img src="data:image/jpeg;base64,'.base64_encode($quesimg).'" height="200" width="200" class="img-thumnail" />';  
							  $name="$examname$subject$qno1"."ques.jpg";
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
							echo "<br><p id='idk' style='font-size:10px;text-align:left;'>Q.$qno1:$question1</p>";
							$name="$examname$subject$qno1"."ques.jpg";
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
		
	<script>
	


function openWin(qn,en,sub) {

  window.open("crop.php?qno="+qn+"&examname="+en+"&subject="+sub+"&option=ques", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}
function openWin1(qn,en,sub) {

  window.open("crop.php?qno="+qn+"&examname="+en+"&subject="+sub+"&option=optionA", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}
function openWin2(qn,en,sub) {

  window.open("crop.php?qno="+qn+"&examname="+en+"&subject="+sub+"&option=optionB", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}
function openWin3(qn,en,sub) {

  window.open("crop.php?qno="+qn+"&examname="+en+"&subject="+sub+"&option=optionC", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}
function openWin4(qn,en,sub) {

  window.open("crop.php?qno="+qn+"&examname="+en+"&subject="+sub+"&option=optionD", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");

}
</script>
</body>
</html>