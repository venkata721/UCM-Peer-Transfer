   window.addEventListener("load",function(){
    //eventListeners for the button controls:
    document.getElementById("register").addEventListener("click",validateAndSubmit,false );
	document.getElementById("submitrequest").addEventListener("click",submitPaymentRequest,false );	
   },false); 
   
   function submitPaymentRequest(){
	   var paymtPurpose = document.getElementById("paymtPur");
	   var currEurSelected = document.getElementById("euro").checked;
	   var currRupSelected = document.getElementById("rupee").checked;
	   var curryenSelected = document.getElementById("yen").checked;
	   
	   var senderPaymt = document.getElementById("spaymtAmt");
	   var contName = document.getElementById("cName");
	   var contNum = document.getElementById("cNum");
	   var contEmail = document.getElementById("cEmail");
	   var contAddres = document.getElementById("cAddress");
	   var country = document.getElementById("cCountry");
	   
	   if(paymtPurpose == null || paymtPurpose.value.length == 0 )
	{
	document.getElementById('paymtPurErr').innerHTML = "* Please enter payment purpose";
	}
	if(senderPaymt == null || senderPaymt.value.length == 0 )
	{
	document.getElementById('spaymtAmtErr').innerHTML = "* Please enter payment amount";
	}
	if(contName == null || contName.value.length == 0 )
	{
	document.getElementById('cNameErr').innerHTML = "* Please enter contact name";
	}
	if(contNum == null || contNum.value.length == 0 )
	{
	document.getElementById('cNumErr').innerHTML = "* Please enter contact number";
	}
	if(contEmail == null || contEmail.value.length == 0 )
	{
	document.getElementById('cEmailErr').innerHTML = "* Please enter contact email";
	}
	if(contAddres == null || contAddres.value.length == 0 )
	{
	document.getElementById('cAddressErr').innerHTML = "* Please enter contact address";
	}
	if(country == null || country.value.length == 0 )
	{
	document.getElementById('cCountryErr').innerHTML = "* Please enter your address";
	}   
	if(currEurSelected==false && currRupSelected==false && curryenSelected==false) 
	{
    document.getElementById('spaymtAmtErr').innerHTML = "* Please Select One";
	}
	else 
	{
		var rup = 67.56;
		var eur = 1.09;
		var yen = 0.0094;
		if(currEurSelected.value == "euro")
		{
			var ramt = document.getElementById('spaymtAmt').value;
		    document.getElementById('spaymtAmt').value = ramt * eur;
		}
		if(currRupSelected.value == "rupee")
		{
			var ramt = document.getElementById('spaymtAmt').value;
		    document.getElementById('spaymtAmt').value = ramt * rup;
		}
		if(currEurSelected.value == "yen")
		{
			var ramt = document.getElementById('spaymtAmt').value;
		    document.getElementById('spaymtAmt').value = ramt * yen;
		}
		
    }	
	/*
	   
	var requestHttp = new XMLHttpRequest();
		requestHttp.onreadystatechange = function() {
			if (requestHttp.readyState == 4 && requestHttp.status == 200) 
			{	
			var response = requestHttp.responseText;
			if(response == "MemberPage.php")
			{
				window.location.href = response;
			};
		}
		}
		requestHttp.open("POST","php/loginaction.php",true);
		requestHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		requestHttp.send("username="+username+"&password="+password);
	  
	*/   
   }
   
  
function validateAndSubmit(){
	var emailId = document.getElementById('email');
	var firstName = document.getElementById('firstName');
	var lastName = document.getElementById('lastName');
	var address = document.getElementById('address');
	var uname = document.getElementById('userName');
	var phoneNumber = document.getElementById('phoneNumber');
	var secQue1 = document.getElementById('secQue1');
	var secQue2 = document.getElementById('secQue2');

	var password = document.getElementById('password1');
	
	if(uname == null || uname.value.length == 0 )
	{
	document.getElementById('userNameErr').innerHTML = "* Please enter the user name";
	}
	if(secQue1 == null || secQue1.value.length == 0 )
	{
	document.getElementById('secQue1Err').innerHTML = "* Please enter the Security Question";
	}
	if(secQue2 == null || secQue2.value.length == 0 )
	{
	document.getElementById('secQue2Err').innerHTML = "* Please enter the Security Question";
	}
	if(emailId == null || emailId.value.length == 0 )
	{
	document.getElementById('emailErr').innerHTML = "* Please enter the email id";
	}
	if(firstName == null || firstName.value.length == 0 )
	{
	document.getElementById('firstNameErr').innerHTML = "* Please enter your first name";
	}
	if(lastName == null || lastName.value.length == 0 )
	{
	document.getElementById('lastNameErr').innerHTML = "* Please enter your last name";
	}
	if(address == null || address.value.length == 0 )
	{
	document.getElementById('addressErr').innerHTML = "* Please enter your address";
	}
	if(phoneNumber == null || phoneNumber.value.length == 0 )
	{
	document.getElementById('phoneNumberErr').innerHTML = "* Please enter your phone number";
	}
	if(password == null || password.value.length == 0)
	{
			document.getElementById('password1Err').innerHTML = "* Please enter your password";
	}
		
		if(!isNaN(firstName.value)){
			document.getElementById('firstNameErr').innerHTML = "* Please enter valid format of first name";
		}
		
		if(!isNaN(lastName.value)){
			document.getElementById('lastNameErr').innerHTML = "* Please enter valid format of last name";
			
		}

		if(isNaN(phoneNumber.value)){
			document.getElementById('phoneNumberErr').innerHTML = "* Please enter the valid phone number format";
			return;
		}
		
		if((phoneNumber.value.length >= 1 && phoneNumber.value.length < 10) || phoneNumber.value.length > 10){
			document.getElementById('phoneNumberErr').innerHTML = "* The phone number should be 10 digits";
			return;
		}
		var atpose = emailId.value.indexOf("@");
		var dotpose = emailId.value.lastIndexOf(".");
		var atposu = uname.value.indexOf("@");
		var dotposu = uname.value.lastIndexOf(".");
		
		if (atpose<1 || dotpose<atpose+2 || dotpose+2>=emailId.value.length) 
			{
				document.getElementById('emailErr').innerHTML = "* Please enter the valid email id";
			}
		if (atposu<1 || dotposu<atposu+2 || dotposu+2>=uname.value.length) 
			{
				document.getElementById('userNameErr').innerHTML = "* Please enter in a email format ";
			}
		if(uname.value == emailId.value)
		{
			var requestHttp = new XMLHttpRequest();
			requestHttp.onreadystatechange = function() {
				if (requestHttp.readyState == 4 && requestHttp.status == 200) 
				{
				var response = requestHttp.responseText;
				if(response == "MemberRegisterSucess.php")
				{
					alert("<b>Registration Succesful</b>");
					window.location.href = response;
				}
				else
				{
				alert(response);
				window.location.href = "RegistrationPage.html";
				}
				}
			};
			requestHttp.open("POST","php/registrationaction.php",true);
			requestHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			requestHttp.send("email="+emailId.value+"&firstname="+firstName.value+"&lastname="+lastName.value+"&address="+address.value+
			"&phonenumber="+phoneNumber.value+"&uname="+uname.value+"&secQue1="+secQue1.value+"&secQue2="+secQue1.value+"&password="+password.value);
		}
		else
		{
		document.getElementById('userNameErr').innerHTML = "** Must be same as Email Value **";
		}

	
}