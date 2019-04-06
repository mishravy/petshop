<?php
session_start();
header("Cache-Control: no-store, no-cache");
header("Content-type: text/javascript");
echo $_SESSION["PrintTheJavaScript"];
if ($_SESSION["PrintTheJavaScript"] == true){
echo '
	window.onload = init;
	function init(){
	var szControl = document.getElementById("fbForm");
	szControl.addEventListener("submit",fbFormValid, false);

/*	document.getElementById("year").addEventListener("change",function(){ calValue(this.value); },false);
	document.getElementById("fp").addEventListener("click",function(){ showFpdiv(); },false);
	document.getElementById("fpBack").addEventListener("click",function(){ fpBack(); },false);
*/


}
	var fbForm = document.getElementById("fbForm");
	var errMsg = document.getElementById("errMsg");
	//var chkbxTC = document.getElementById("chkbxTC");

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



function fbFormValid(evt)
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
		errMsg.innerHTML = "last name is required";
		evt.preventDefault();
	}
	else if(document.getElementById("comment").value=="")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "comment is required";
		evt.preventDefault();
	}
	else if(document.getElementById("day").value=="0")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Date is required";
		evt.preventDefault();
	}
	else if(document.getElementById("month").value=="0")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Month is required";
		evt.preventDefault();
	}
	else if(document.getElementById("year").value=="0")
	{
		document.getElementById("errMsg").style.display = "block";
		errMsg.innerHTML = "Year is required";
		evt.preventDefault();
	}
	else
	{
		return true;
	}
	setTimeout(function(){
  	$(".errCl").fadeOut("slow");}, 1500);
}

';
	}else{
		echo "JavaScript Not Work";
	}
	$_SESSION["PrintTheJavaScript"] = false;
?>