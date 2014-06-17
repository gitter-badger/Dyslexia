<?php


$con=mysqli_connect("localhost","root","","dyslexia");



// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sSQL= 'SET CHARACTER SET utf8'; 

mysqli_query($con,$sSQL) 
or die ('Can\'t charset in DataBase'); 
			

?>