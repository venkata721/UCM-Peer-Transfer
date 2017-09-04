   window.addEventListener("load",function(){
    //eventListeners for the button controls:
    document.getElementById("login").addEventListener("click",loginValidation,false );	
   },false); 
function loginValidation()
{
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var reg1 = /^[0-9a-zA-Z]+$/;
	if(username == null || username.length == 0 && password == null || password.length == 0 ){
		document.getElementById('usernameErr').innerHTML ="* Please enter the username";
				document.getElementById('passwordErr').innerHTML ="* Please enter the password";
	} else if(reg.test(username) == false) 
	{
			document.getElementById('usernameErr').innerHTML ="* Please enter the valid email id";
			return;
	} else if((reg1.test(password) == false) && ((password.length <= "6")||(password.length >= "8")))
	{
			document.getElementById('passwordErr').innerHTML ="* Invalid Password Format";
		}
		else{
			var requestHttp = new XMLHttpRequest();
		requestHttp.onreadystatechange = function() {
			if (requestHttp.readyState == 4 && requestHttp.status == 200) 
			{	
			var response = requestHttp.responseText;
			if(response == "MemberPage.php")
			{
				window.location.href = response;
			}else if(response == "HomePage1.html")
			{
			alert("Invalid Username and password");
			window.location.href = "HomePage.html";
8/*			document.getElementById('mainErr1').style.display ="block";
			document.getElementById('mainErr2').style.display ="none";
*/
			}else
			{
			alert("* That user does not exist");
/*			document.getElementById('mainErr2').style.display ="block";
			document.getElementById('mainErr1').style.display ="none";
*/
			window.location.href = "HomePage.html";
			};
		}
		}
		requestHttp.open("POST","php/loginaction.php",true);
		requestHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		requestHttp.send("username="+username+"&password="+password);
	}
		}

   

 
