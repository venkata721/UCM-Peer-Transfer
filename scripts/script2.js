   window.addEventListener("load",function(){
    //eventListeners for the button controls:
	document.getElementById("submitrequest").addEventListener("click",submitPaymentRequest,false );	
	document.getElementById("reset").addEventListener("click",resetValues,false );	
	},false); 
	
   function resetValues()
   {
	 document.getElementById("paymtPur").value = "";
	  document.getElementById("euro").checked = false;
	  document.getElementById("rupee").checked = false;
	  document.getElementById("yen").checked = false;
	  document.getElementById("spaymtAmt").value = "";
	  	  document.getElementById("rpaymtAmt").value = "";

	  document.getElementById("cName").value = "";
	   document.getElementById("cNum").value = "";
	  document.getElementById("cEmail").value = "";
		document.getElementById("cAddress").value = "";
	  document.getElementById("cCountry").value = "";  
	}
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
	   
	if(paymtPurpose.value == "" || paymtPurpose.value.length == 0 )
	{
	document.getElementById('paymtPurErr').innerHTML = "* Please enter payment purpose";
	}
	if(senderPaymt.value == "" || senderPaymt.value.length == 0 )
	{
	document.getElementById('spaymtAmtErr').innerHTML = "* Please enter payment amount";
	}
	if(contName.value == "" || contName.value.length == 0 )
	{
	document.getElementById('cNameErr').innerHTML = "* Please enter contact name";
	}
	if(contNum.value == "" || contNum.value.length == 0 )
	{
	document.getElementById('cNumErr').innerHTML = "* Please enter contact number";
	}
	if(contEmail.value == "" || contEmail.value.length == 0 )
	{
	document.getElementById('cEmailErr').innerHTML = "* Please enter contact email";
	}
	if(contAddres.value == "" || contAddres.value.length == 0 )
	{
	document.getElementById('cAddressErr').innerHTML = "* Please enter contact address";
	}
	if(country.value == "" || country.value.length == 0 )
	{
	document.getElementById('cCountryErr').innerHTML = "* Please enter your address";
	}   
	if(currEurSelected==false && currRupSelected==false && curryenSelected==false) 
	{
    document.getElementById('spaymtAmtErr').innerHTML = "* Please Select One";
	}

	if(!isNaN(paymtPurpose.value)){
			document.getElementById('paymtPurErr').innerHTML = "* Error format of Payment purpose";
		}
		if(!isNaN(country.value)){
			document.getElementById('cCountryErr').innerHTML = "* Error format of Country";
		}
		
	if(!isNaN(contName.value)){
			document.getElementById('cNameErr').innerHTML = "* Error format of contact name";
		}
		
		if(isNaN(senderPaymt.value)){
			document.getElementById('spaymtAmt').innerHTML = "* Error format of payment amount";
			
		}

		if(isNaN(contNum.value)){
			document.getElementById('cNumErr').innerHTML = "* Error phone number format";
		}
		
		if((contNum.value.length >= 1 && contNum.value.length < 10) || contNum.value.length > 10)
		{
						document.getElementById('cNumErr').innerHTML ="* The phone number should be 10 digits";
		}
		var atpose = contEmail.value.indexOf("@");
		var dotpose = contEmail.value.lastIndexOf(".");
		if (atpose<1 || dotpose<atpose+2 || dotpose+2>=contEmail.value.length) 
			{
				document.getElementById('cEmailErr').innerHTML = "* Error format of email id";
			}
		if(paymtPurpose && senderPaymt && contAddres && contName && contEmail && contNum)
		{
		
			var requestHttp = new XMLHttpRequest();
			requestHttp.onreadystatechange = function() {
			if (requestHttp.readyState == 4 && requestHttp.status == 200) 
			{	
			var response = requestHttp.responseText;
			document.getElementById('anotherIDrequired').style.display = "block";
			document.getElementById('anotherIDrequired').innerHTML = response;
			document.getElementById('anotherReqLink').style.display = "block";
			document.getElementById('paymentTable').style.display = "none";
			}
		}
		requestHttp.open("POST","php/insertRequest.php",true);
		requestHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		requestHttp.send("contemail="+contEmail.value+"&contname="+contName.value+"&contaddress="+contAddres.value+
			"&contnumber="+contNum.value+"&paymentamount="+document.getElementById('rpaymtAmt').value+"&paymentpur="+paymtPurpose.value
			+"&paymentstatus="+"PENDING");
		 
   }
   }  
	function provideValue()
	{
	   var currEurSelected = document.getElementById("euro").checked;
	   var currRupSelected = document.getElementById("rupee").checked;
	   var curryenSelected = document.getElementById("yen").checked;
		var ramt = document.getElementById('spaymtAmt').value;
		var rup = 67.56;
		var eur = 0.92;
		var yen = 106.67;
		if(currEurSelected == true)
		{
			document.getElementById('rpaymtAmt').value = Math.round(ramt / eur);
		}
		if(currRupSelected == true)
		{
		    document.getElementById('rpaymtAmt').value = Math.round(ramt / rup);
		}
		if(curryenSelected == true)
		{
		    document.getElementById('rpaymtAmt').value = Math.round(ramt / yen);
		}
	
		
	}

