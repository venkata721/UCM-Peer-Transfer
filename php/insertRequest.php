<?php
		session_start();
			$user = $_SESSION['username'];
		try
		{
		$conn = mysqli_connect('localhost', 'root', '') or 	die('Could not connect to the Database');
		$paymtAmt = mysqli_real_escape_string($conn,$_POST["paymentamount"]);
		$paymtPur = mysqli_real_escape_string($conn,$_POST["paymentpur"]);
		$contName = mysqli_real_escape_string($conn,$_POST["contname"]);
		$contNum = mysqli_real_escape_string($conn,$_POST["contnumber"]);
		$contAddress = mysqli_real_escape_string($conn,$_POST["contaddress"]);
		$contEmail = mysqli_real_escape_string($conn,$_POST["contemail"]);
		$paymtStatus = mysqli_real_escape_string($conn,$_POST["paymentstatus"]);
		mysqli_select_db($conn,'peertransferdb') or 	die('Could not connect to the Database');
		$regQuery =
			"
			INSERT INTO `payment_transfer`(`PAYMENTPURPOSE`, `PAYMENTAMOUNT`, `USERNAME`, `CONTACTNAME`, `CONTACTPHONE`, `CONTACTADDRESS`,
			`CONTACTEMAIL`, `PAYMENTSTATUS`) VALUES ('$paymtPur','$paymtAmt','$user','$contName','$contNum','$contAddress','$contEmail','$paymtStatus');
			";
			$retval1 = mysqli_query($conn,$regQuery);
            if(! $retval1 ) 
			{	
               die('Could not enter data: ' . mysqli_error($conn));
            }
            else
			{
				echo " Payment Transfer Requested Successfully ";
            }
	      	mysqli_close($conn);		
		} catch(Exception $e){
		echo "you got server connectivity problem, while inserting please try again";
		}
		?>