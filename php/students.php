<?php
	include('config.php');
	session_start();
	
	$conn = mysqli_connect($host,$username,$password,$dbname);
	$id = $_SESSION['id'];
	$query = "SELECT C.COURSES,C.COURSECODE,C.DATE,C.TIME,C.FACULTY,C.DURATION,C.LOCATION FROM COURSES C,
	COURSE_REG RG WHERE RG.COURSEID = C.ID AND RG.REGID = ".intval($id);
	$retval = mysqli_query($conn,$query);
	$var = "";
	$var="<tr><th style=\"border: 1px solid #009688\">COURSE</th><th style=\"border: 1px solid #009688\">
	COURSE CODE</th><th style=\"border: 1px solid #009688\">DATE</th><th style=\"border: 1px solid #009688\">
	TIME</th><th style=\"border: 1px solid #009688\">FACULTY</th><th style=\"border: 1px solid #009688\">DURATION
	</th><th style=\"border: 1px solid #009688\">LOCATION</th></tr>";
	while($row = mysqli_fetch_array($retval,MYSQLI_NUM)){
		$var .= "<tr><td style=\"border: 1px solid #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[0]."</p></td>";
		$var .= "<td style=\"border: 1px solid #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[1]."</p></td>";
		$var .= "<td style=\"border: 1px solid #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[2]."</p></td>";
		$var .= "<td style=\"border: 1px soli.d #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[3]."</p></td>";
		$var .= "<td style=\"border: 1px solid #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[4]."</p></td>";
		$var .= "<td style=\"border: 1px solid #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[5]."</p></td>";
		$var .= "<td style=\"border: 1px solid #009688\"><p style=\"font-family:verdana;font-size:90%;\">".$row[6]."</p></td></tr>";
	}
	$html_string = "<p style=\"font-family:verdana;font-size:90%;\">Hi,".$_SESSION['firstname']."</p></br><p style=\"font-family:verdana;
	font-size:90%;\">Below are the courses you have selected</p></br>
	<table align=\"left\" style=\"border-collapse:collapse;border: 1px solid #009688;\">".$var."</table></br></br>
	<table align=\"left\"><tr><td style=\"width:400px;\"><p class=\"login button\" vertical-align=\"top\">
	<input id=\"logout\" type=\"button\" value=\"Logout\" onclick=\"logout()\"/></td></tr></table>";
	echo $html_string;
	mysqli_close($conn);
?>