<?php
session_start();
header("Cache-Control: no-store, no-cache");
header("Content-type: text/javascript");
echo $_SESSION["PrintTheJavaScript"];
if ($_SESSION["PrintTheJavaScript"] == true){
echo '
	window.onload = init;
	function init(){
	var szControl = document.getElementById("regForm");
	szControl.addEventListener("submit",regFormValid, false);
	
/*	document.getElementById("year").addEventListener("change",function(){ calValue(this.value); },false);
*/	document.getElementById("fp").addEventListener("click",function(){ showFpdiv(); },false);
	document.getElementById("fpBack").addEventListener("click",function(){ fpBack(); },false);
	
	
	var szControl2 = document.getElementById("loginFrm");
	szControl2.addEventListener("submit",loginFrmValid, false);
	
	var szControl3 = document.getElementById("forgetPwdFrm");
	szControl3.addEventListener("submit",forgetPwdFrmValid, false);
	
}
	var regForm = document.getElementById("regForm");
	var errMsg = document.getElementById("errMsg");
	var chkbxTC = document.getElementById("chkbxTC");

function calValue(id)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
  	{
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function()
  	{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
			document.getElementById("year").innerHTML=xmlhttp.responseText;
    	}
  	}
	xmlhttp.open("GET","getDatetag.php?id="+id,true);
	xmlhttp.send();
}

function showFpdiv()
{
	document.getElementById("Fpdiv").style.display="block";
	document.getElementById("loginDv").style.display="none";
}

function fpBack()
{
	document.getElementById("Fpdiv").style.display="none";
	document.getElementById("loginDv").style.display="block";
}

function regFormValid(evt)
{
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(document.getElementById("firstNm").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "First name is required";
		evt.preventDefault();
	}
	else if(document.getElementById("lastNm").value=="")
	{
		
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Last name is required";
		evt.preventDefault();
	}
	else if(document.getElementById("emailId").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Email Id is required";
		evt.preventDefault();
	}
	else if (!filter.test(document.getElementById("emailId").value))
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Please provide a valid email address";
		email.focus;
		evt.preventDefault();
	}	
	else if(document.getElementById("day").value=="0")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Birth date is required";
		evt.preventDefault();
	}
	else if(document.getElementById("month").value=="0")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Birth month is required";
		evt.preventDefault();
	}
	else if(document.getElementById("year").value=="0")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Birth year is required";
		evt.preventDefault();
	}
	else if(document.getElementById("pwd").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Password is required";
		evt.preventDefault();
	}
	else if(document.getElementById("pwd").value.length < 8)
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Password should contain 8 characters atleast";
		evt.preventDefault();
	}
	else if(document.getElementById("cpwd").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Confirm password is required";
		evt.preventDefault();
	}
	else if(document.getElementById("pwd").value != document.getElementById("cpwd").value)
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Password and confirm password should be same";
		evt.preventDefault();
	}
	
	else if(regForm.chkbxTC.checked == false)
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Please agree to Terms and Conditions";
		evt.preventDefault();
	}
	else
	{
		return true;
	}
	setTimeout(function(){
  	$(".errCl").fadeOut("slow");}, 2000);
}

function loginFrmValid(evt)
{
	if(document.getElementById("loginId").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Please enter login Id";
		evt.preventDefault();
	}
	else if(document.getElementById("loginPwd").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Please enter password";
		evt.preventDefault();
	}
	else
	{
		return true;
	}
	setTimeout(function(){
  	$(".errCl").fadeOut("slow");}, 2000);
}

function forgetPwdFrmValid(evt)
{
	document.getElementById("errMsg").style.display = "block";
	if(document.getElementById("FPemailId").value=="")
	{
		errMsg.innerHTML = "Please enter login Id";
		evt.preventDefault();
	}
	else
	{
		return true;
	}
	setTimeout(function(){
  	$(".errCl").fadeOut("slow");}, 2000);
}
';
	}else{
		echo "JavaScript Not Work";
	}
	$_SESSION["PrintTheJavaScript"] = false;
?>