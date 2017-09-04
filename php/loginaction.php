<?php

session_start();

$uservalue = $_POST['username'];
$paswdvalue = $_POST['password']; 
try{
if($uservalue&&$paswdvalue)
{

	$con = mysqli_connect('localhost', 'root', '') or 	die('Could not connect to the Database');
	mysqli_select_db($con,'peertransferdb') or 	die('Could not connect to the Database');
	$query=mysqli_query($con, "SELECT * FROM member_login where membusername='$uservalue';");
	$numrows = mysqli_num_rows($query);
	if($numrows != 0)
	{
		$row = mysqli_fetch_assoc($query);
		$dbusername= $row['membusername'];
		$dbpassword= $row['membpassword'];
		if($uservalue == $dbusername AND $paswdvalue == $dbpassword)
		{
			$_SESSION['username'] = $uservalue;
			echo "MemberPage.php";
		}
		else
		{
			echo "HomePage1.html";
		}
		}
		else
		{
				echo "HomePage2.html";
				die("That user does not exist !!");
				mysqli_close($con);
		}
	}
else
		{
			header("refresh:0; url=HomePage.html");
			echo "<script> alert('Please provide your User Name or Password ! ');
				</script> ";
		}
} catch(Exception $e){
echo $e;
		mysqli_close($con);
}

?>