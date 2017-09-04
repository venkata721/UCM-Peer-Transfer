<?php
		try
		{
		$conn = mysqli_connect('localhost', 'root', '') or 	die('Could not connect to the Database');
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
		$lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
		$phonenumber = mysqli_real_escape_string($conn,$_POST["phonenumber"]);
		$address = mysqli_real_escape_string($conn,$_POST["address"]);
		$pass = mysqli_real_escape_string($conn,$_POST["password"]);
		$username = mysqli_real_escape_string($conn,$_POST["uname"]);
		$secQueOne = mysqli_real_escape_string($conn,$_POST["secQue1"]);
		$secQueTwo = mysqli_real_escape_string($conn,$_POST["secQue2"]);
		mysqli_select_db($conn,'peertransferdb') or 	die('Could not connect to the Database');
		$regQuery = 
		"INSERT INTO member_register(EMAIL,PASSWORD,FIRSTNAME,LASTNAME,ADDRESS,SECQUE1,SECQUE2,USERNAME,PHONENO) VALUES('$email','$pass','$firstname','$lastname','$address','$secQueOne','$secQueTwo','$username','$phonenumber');";
			$retval1 = mysqli_query($conn,$regQuery);
            
            if(! $retval1 ) 
			{
               die('Could not enter data: ' . mysqli_error($conn));
            }
            else
			{
				echo "MemberRegisterSucess.php";
            }
	
            $logquery = "INSERT INTO member_login (membusername,membpassword) VALUES('$username','$pass')";
			$retval2 = mysqli_query( $conn,$logquery);
        	if(! $retval2) 
			{
               die('Could not enter data: ' . mysqli_error($conn));
            }
        	mysqli_close($conn);		
		} catch(Exception $e){
		echo "you got server connectivity problem, while inserting please try again";
		}
		?>