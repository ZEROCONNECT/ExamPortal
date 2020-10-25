<?php 
//File destination
$destination = "/folder/cropped_image.png";
//Get uploaded image file it's temporary name
$image_tmp_name = $_FILES["cropped_image"]["tmp_name"][0];
//Move temporary file to final destination
move_uploaded_file($image_tmp_name, $destination);


?>