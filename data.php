<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
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
	
    }
else
{
	$quesname="";
}

$sql9= "select subject from $omrname where id=$idd;";
$result9 = $conn-> query($sql9);
while ($row1 = $result9-> fetch_assoc())
{
	$suba=$row1['subject'];
}

	if ($suba=="all")
	{
		$sql2 = "select count(*) from $quesname ;";
		$result1 = $conn-> query($sql2);
		while ($row = $result1-> fetch_assoc())
			{
				$k=$row['count(*)'];
			}
		$sql = "select * from $omrname where id=$idd; ";
	
		$result = $conn-> query($sql);
		if ($result-> num_rows > 0)
			{
				while ($row = $result-> fetch_assoc())
				{	
			
					$j=0;
			
						for($i=1; $i<=$k;$i++)
					{
						$c=$row["qs$i"];
						if($j==6)
						{
							$j=0;
							
						}
						$j++;
						if ($c>0)
						{
							$a=$c%10;
							if($a==5)
						{
							echo"<a href='quiz.php?id=$i&suba=all&idd=$idd&omrname=$omrname&quesname=$quesname'><button style='color:black; padding:10px ' class='ans1'>$i</button></a>";
						}
						if($a==6)
						{
							echo"<a href='quiz.php?id=$i&suba=all&idd=$idd&omrname=$omrname&quesname=$quesname'><button style='color:black; padding:10px ' class='rev'>$i</button></a>";
						}
						continue;
					}
					echo"<a href='quiz.php?id=$i&suba=all&idd=$idd&omrname=$omrname&quesname=$quesname'><button style='color:black; padding:10px ' class='notans'>$i</button></a>";
				
				
		
					}
			

				}
			}
	}
	else
	{
		$sql3 = "select count(*) from $quesname where subject='$suba';";
		$sql4 = "select id from $quesname where subject='$suba';";
		$result1 = $conn-> query($sql3);
		$result2 = $conn-> query($sql4);
		while ($row = $result1-> fetch_assoc())
			{
				$k=$row['count(*)'];
				
			}
		if ($k==0)
		{
			echo'<p style="color:white;">No Questions Available in this Section<p>';
		}
		while ($row = $result2-> fetch_assoc())
		{
			
			$r = $row['id'];
			
			$sql = "select * from $omrname where id=$idd; ";

			$result = $conn-> query($sql);
			if ($result-> num_rows > 0)
			{
				while ($row = $result-> fetch_assoc())
				{	
			
			$j=0;
			
			
				$c=$row["qs$r"];
				
				if($j==4)
				{
					$j=0;
					
				}
				$j++;
				if ($c>0)
				{
					$a=$c%10;
					if($a==5)
					{	

						echo"<a href='quiz.php?id=$r&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname'><button style='color:black; padding:10px ' class='ans1'>$r</button></a>";
					}
					if($a==6)
					{
						echo"<a href='quiz.php?id=$r&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname'><button style='color:black; padding:10px ' class='rev'>$r</button></a>";
					}
					continue;
				}
				echo"<a href='quiz.php?id=$r&suba=$suba&idd=$idd&omrname=$omrname&quesname=$quesname'><button style='color:black; padding:10px ' class='notans'>$r</button></a>";
				
				
				
			
			
			
			
			
	}
}
	}
	}

		?>	
</body>
</html>