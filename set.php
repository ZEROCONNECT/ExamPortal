<?php 
$url = $_POST['url'];
$file_pointer = "$url";  
   
// Use unlink() function to delete a file  
if (!unlink($file_pointer)) {  
    echo ("failed");  
}  
else {  
    echo ("sucess");  
}  








?>