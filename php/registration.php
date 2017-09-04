<?php
	include 'config.php';
	try{
		$conn = mysqli_connect($host,$username,$password,$dbname);
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
		$lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
		$phonenumber = mysqli_real_escape_string($conn,$_POST["phonenumber"]);
		$courses = mysqli_real_escape_string($conn,$_POST["courses"]);
		$address = mysqli_real_escape_string($conn,$_POST["address"]);
		$pass = mysqli_real_escape_string($conn,$_POST["password"]);
		$coursesId = 0;
		$registrationId = 0;
		
		$query = "INSERT INTO REGISTRATION(EMAIL,FIRSTNAME,LASTNAME,ADDRESS,PHONENO,PASSWORD) VALUES ('".$email."','".$firstname."','".$lastname."','".$address."','".$phonenumber."','".$pass."')";
		$query1 = "SELECT ID FROM REGISTRATION WHERE EMAIL = '$email'";
		
		mysqli_query($conn,$query);
		
		$retval1 = mysqli_query($conn,$query1);
		while($row = mysqli_fetch_array($retval1,MYSQLI_NUM)){
		}
		
		
		$courseArray = explode(',',$courses);
		
		foreach($courseArray as $value){
			$query2 = "SELECT ID FROM COURSES WHERE COURSES = ".intval($value);
			$retval = mysqli_query($conn,$query2);
			//print_r($retval);
			while($rows = mysqli_fetch_array($retval,MYSQLI_NUM)){
				$query3 = "INSERT INTO COURSE_REG(REGID,COURSEID) VALUES ($row[0],$rows[0])";
				mysqli_query($conn,$query3);
			}
	}
		mysqli_close($conn);
	} catch(Exception $e){
		echo "you got server connectivity problem, while inserting please try again";
	}
?>