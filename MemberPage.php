<!DOCTYPE html>
<html>
 <head>
  <title> International Peer Transfer System </title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="scripts/styles.css">
  <script type="text/javascript" src="scripts/script2.js"></script>
 </head>
<?php
			session_start();
			$user = $_SESSION['username'];
		    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
			if($user)
			{
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Could not connect: ' . mysqli_error($conn));
			mysqli_select_db($conn,'peertransferdb') or die('Could not connect: ' . mysqli_error($conn));
			$fullnmqry = mysqli_query($conn,"select FIRSTNAME,LASTNAME,PHONENO,ADDRESS,EMAIL from member_register where USERNAME = '$user'");
			$numrows = mysqli_num_rows($fullnmqry);
			if($numrows != 0)
			{
				$row = mysqli_fetch_assoc($fullnmqry);
				$fname= $row['FIRSTNAME'];
				$lname= $row['LASTNAME'];
				$fullname = $fname;
				$fullname .= " ".$lname;
				$phone = $row['PHONENO'];
				$addr = $row['ADDRESS'];
				$email = $row['EMAIL'];
			}
			else
			{
				echo "No Rows fetched for username";
				die("That user does not exist !!");
			}
			}
			else
			{
				echo ("<script type='text/javascript'>alert('Member Not Avaialble')</script>");
				die("That user does not exist !!");
			}
			mysqli_close($conn);

            ?>
 <body id="home" style="background-color:#D6DBDF">
	<img src="scripts/images/peerTr.jpg" width="1200" height="150" />
	<div id="nav-wrapper">
		<ul id="nav">
			<li><a id="home" href="MemberPage.php">Home Page</a></li>
			<li><a id="aboutUs" href="MembAboutUsPage.html">About Us</a></li>
			<li><a id="careers" href="MembCareersPage.html">Careers</a></li>
			<li><a id="contact" href="MembContactUsPage.html">Contact Us</a></li>
		</ul>
		<a class="logout" href="LogoutPage.php">LogOut</a>
	</div>
<p id="required" style="margin-bottom:3px; margin-top: 3px;"><b> Welcome, <?php  echo $fullname ;?> </b></p>
	<div id="portion1">
		<p class="memheadings"><b> <center> SUBMIT PAYMENT TRANSFER REQUEST </center></b></p>
	<hr>
	<form id="paymentForm">
<p id="anotherIDrequired" style="display:none;"  >
 </p>
	<a id="anotherReqLink" class="anotherReq" style="display:none;text-align:center;" href="MemberPage.php">Click Here To Submit another request</a>

 <table id="paymentTable" style="display:block;"align="center" border="1">
		<tr>
		<td width="20%"> Payment Purpose </td>
		<td>
		<input id="paymtPur" class="textbox" style="width:200px;" type="text" />
		<span id="paymtPurErr" class="err"> </span>
		</td>
		</tr>
		<tr>  
		<td colspan="2"><center>Select the currency below </center></td>
		</tr>
		<tr>  
		<td colspan="2">
		<center>
		<input value="euro" id="euro" type="radio" name="currency"/>Euro
		<input value="rupee" id="rupee" type="radio" name="currency"/>Rupees
		<input value="yen" id="yen" type="radio" name="currency"/>Yen
		<span id="spaymtAmtErr" class="err"> </span>
		</center>
		</td>
		</tr>
		<tr>
		<td width="20%"> Sender Payment Amount </td>
		<td>
		<input id="spaymtAmt" class="textbox" style="width:200px;" type="text" onmouseout="provideValue();" />
		<span id="spaymtAmtErr" class="err"> </span>
		</td>
		</tr>
		<tr>
		<td width="20%"> Receiver Payment Amount </td>
		<td>
		<input id="rpaymtAmt" class="textbox" style="width:200px;" type="text" readonly="true" />$
		</td>
		</tr>
		<tr>
		<td width="20%"> Contact Person </td>
		<td>
		<input id="cName" class="textbox" style="width:200px;" type="text" />
		<span id="cNameErr" class="err"> </span>
		</td>
		</tr>
		<tr>
		<td width="20%"> Contact Number </td>
		<td>
		<input id="cNum" class="textbox" style="width:200px;" type="text" />
		<span id="cNumErr" class="err"> </span>
		</td>
		</tr>
		<tr>
		<td width="20%"> Contact Email </td>
		<td>
		<input id="cEmail" class="textbox" style="width:200px;" type="text" />
		<span id="cEmailErr" class="err"> </span>
		</td>
		</tr>
		<tr>
		<td width="20%"> Contact Address </td>
		<td>
		<textarea id="cAddress" style="width:200px;"></textarea>
		<span id="cAddressErr" class="err"> </span>
		</td>
		</tr>
		<tr>
		<td width="20%"> Country </td>
		<td>
		<input id="cCountry" class="textbox" style="width:200px;" type="text" />
		<span id="cCountryErr" class="err"> </span>
		</td>
		</tr>
		
		<tr>  
		<td colspan="2">
		<center>
		<p class="login button" style="margin:0px;margin-top:5px;">
		<input id="submitrequest" type="button" value="Submit Request"/> 
		<input id="reset" type="button" value="Reset"/> 										
		</p>
		</center>
		</td>
		<tr/>
		</table>
		</form>
	</div>
 <div id="portion2">
<p class="memheadings"><b> <center> PROFILE DETAILS </center></b></p>
	<hr>
	<center><label id="required" >Full Name :<label>
	<span id="required"><?php echo $fullname;?></span>
	<br/>
	<br/>
	<label id="required" >Phone Number :<label>
	<span id="required"><?php echo $phone;?></span>
	<br/>
	<br/>
	<label id="required" >Address :<label>
	<span id="required"><?php echo $addr;?></span>
	<br/>
	<br/>
	<label id="required" >Email :<label>
	<span id="required"><?php echo $email;?></span>
	<br/>
	</center>
	</div>
	<div id="portion3">
<p class="memheadings"><b> <center> TRACK PAYMENT STATUS </center></b></p>
	<hr/>
		<table border="1">
			<tr >
			<td width="20%">Purpose</td>
			<td width="20%">Amount($)</td>
			<td width="20%">Status</td>
			<td width="20%">Phone Number</td>
			</tr>
			<tr>
			<?php
			try
			{
			$uservalue = $_SESSION['username'];
			echo("<script> alert('Username = '".$_SESSION['username'].")</script>");
			$conn = mysqli_connect('localhost', 'root', '') or die('Could not connect: ' . mysqli_error($conn));
			mysqli_select_db($conn,'peertransferdb') or die('Could not connect: ' . mysqli_error($conn));
			$paymtList = mysqli_query($conn,"SELECT * FROM `payment_transfer` WHERE USERNAME = '$uservalue'");
			while($row = mysqli_fetch_array($paymtList,MYSQLI_ASSOC))
			{				
			?>
			<td><?php echo $row['PAYMENTPURPOSE'];?></td>
			<td><?php echo $row['PAYMENTAMOUNT']; ?></td>
			<td><?php echo $row['PAYMENTSTATUS']; ?></td>			
			<td><?php echo $row['CONTACTPHONE'];?></td>
			</tr>
			<?php
			}
			}
			catch(Exception $e)
			{
				echo "Issue With Database Fetching and Connectivity";
				mysqli_close($conn);
			}
			?>
		</table>
	</div>
 </body>
</html>
