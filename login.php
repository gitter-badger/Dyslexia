<?php
include("connex_bdd.php");



if (
	
	(isset($_POST['loginemail']) && !empty($_POST['loginemail']))
	AND
	(isset($_POST['loginpassword']) && !empty($_POST['loginpassword']))


	)
{

// username and password sent from Form 
$myusername=addslashes($_POST['loginemail']); 
$mypassword=addslashes($_POST['loginpassword']); 

$sql="SELECT * FROM members WHERE email='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);

 
$count=$result->num_rows;

	if($count==1)
	{

		//variable session
		session_start();
		$_SESSION['email'] = $myusername;
	
		if (($myusername=="admin@mail.com")&&($mypassword=="adminpass")) 
		{
			header("location:http://localhost/Dyslexie/sb-admin/index.php");
		}else
		{header("location: quiz.php");}
	}
	else 
	{
	echo"<h3>الرجاء التأكد من معلومات الدخول</h3>";
	}

}
else
{
	echo "<h3>الرجاء التأكد من ملا المعلومات التالية قبل الدخول</h3>";
	if (empty($_POST['loginemail'])){echo"<h3>البريد الالكتروني</h3>";}
	if (empty($_POST['loginpassword'])){echo"<h3>كلمة السر</h3>";}
}
mysqli_close($con);
?>