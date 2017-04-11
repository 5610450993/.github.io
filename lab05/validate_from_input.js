// JavaScript Document

function validateText(evt) {
  	var theEvent = evt || window.event;
  	var key = theEvent.keyCode || theEvent.which;
  	key = String.fromCharCode( key );
  	var regex = /[0-9]/;
  	if( regex.test(key) ) {
    	theEvent.returnValue = false;
    	if(theEvent.preventDefault) theEvent.preventDefault();
  	}
	
	return regex.test(evt);
}


function validateNumber(evt) {
  	var theEvent = evt || window.event;
  	var key = theEvent.keyCode || theEvent.which;
  	key = String.fromCharCode( key );
  	var regex = /[0-9]/;
  	if( !regex.test(key) ) {
    	theEvent.returnValue = false;
    	if(theEvent.preventDefault) theEvent.preventDefault();
  	}
}

function validatePhoneNumber(evt) {
	var str = document.getElementById("phoneno").value;
  	var theEvent = evt || window.event;
  	var key = theEvent.keyCode || theEvent.which;
 	key = String.fromCharCode( key );
 	var regex = /[0-9]/;
 	if( !regex.test(key) ) {
    	theEvent.returnValue = false;
    	if(theEvent.preventDefault) theEvent.preventDefault();
  	}
	if(str.length <= 5){
		document.getElementById("phoneno").value = "+662-";	
	}else if(str.length == 8){
		document.getElementById("phoneno").value = str + "-";
	}
}

function validateCellPhoneNumber(evt) {
	var str = document.getElementById("cellphoneno").value;
  	var theEvent = evt || window.event;
  	var key = theEvent.keyCode || theEvent.which;
 	key = String.fromCharCode( key );
 	var regex = /[0-9]/;
 	if( !regex.test(key) ) {
    	theEvent.returnValue = false;
    	if(theEvent.preventDefault) theEvent.preventDefault();
  	}
	if(str.length <= 3){
		document.getElementById("cellphoneno").value = "+66";	
	}else if(str.length == 5 || str.length == 9){
		document.getElementById("cellphoneno").value = str + "-";
	}
}

function validateBirthday(evt) {
  	var str = document.getElementById("birthday").value;
  	var theEvent = evt || window.event;
  	var key = theEvent.keyCode || theEvent.which;
  	key = String.fromCharCode( key );
  	var regex = /[0-9]/;
  	if( !regex.test(key) ) {
    	theEvent.returnValue = false;
    	if(theEvent.preventDefault) theEvent.preventDefault();
  	}
  	if(str.length == 2 || str.length == 5){
	  	document.getElementById("birthday").value = str + "/";
  	}
}

function saved(){
	localStorage.setItem("firstname", document.getElementById("firstname").value);
	localStorage.setItem("lastname", document.getElementById("lastname").value);
	localStorage.setItem("phoneno", document.getElementById("phoneno").value);
	localStorage.setItem("cellphoneno", document.getElementById("cellphoneno").value);
	localStorage.setItem("birthday", document.getElementById("birthday").value);
	localStorage.setItem("citinum", document.getElementById("citinum").value);
	localStorage.setItem("adress", document.getElementById("adress").value);
	
	localStorage.setItem("zodiacsign", document.getElementById("zodiacsign").value);
	localStorage.setItem("zodiacyear", document.getElementById("zodiacyear").value);
	localStorage.setItem("bdow", document.getElementById("bdow").value);
	alert('Remember')
}

function loaded(){
	if(localStorage.getItem('firstname') != null) 
		document.getElementById("firstname").value = localStorage.getItem('firstname');
	if(localStorage.getItem('lastname') != null)
		document.getElementById("lastname").value = localStorage.getItem('lastname');
	if(localStorage.getItem('phoneno') != null)
		document.getElementById("phoneno").value = localStorage.getItem('phoneno');
	if(localStorage.getItem('cellphoneno') != null)
		document.getElementById("cellphoneno").value = localStorage.getItem('cellphoneno');
	if(localStorage.getItem('birthday') != null)
		document.getElementById("birthday").value = localStorage.getItem('birthday');
	if(localStorage.getItem('citinum') != null)
		document.getElementById("citinum").value = localStorage.getItem('citinum');
	if(localStorage.getItem('adress') != null)
		document.getElementById("adress").value = localStorage.getItem('adress');
		
	if(localStorage.getItem('zodiacsign') != null)
		document.getElementById("zodiacsign").value = localStorage.getItem('zodiacsign');
	if(localStorage.getItem('zodiacyear') != null)
		document.getElementById("zodiacyear").value = localStorage.getItem('zodiacyear');
	if(localStorage.getItem('bdow') != null)
		document.getElementById("bdow").value = localStorage.getItem('bdow');
}

function canceled(){
	document.getElementById("firstname").value = "";
	document.getElementById("lastname").value = "";
	document.getElementById("phoneno").value = "";
	document.getElementById("cellphoneno").value = "";
	document.getElementById("birthday").value = "";
	document.getElementById("citinum").value = "";
	document.getElementById("adress").value = "";
	document.getElementById("zodiacsign").value = "aries";
	document.getElementById("zodiacyear").value = "rat";
	document.getElementById("bdow").value = "monday";
	localStorage.clear();
}

function submited(){
	var fname = document.getElementById("firstname").value;
	var lname = document.getElementById("lastname").value;
	var pnumber = document.getElementById("phoneno").value;
	var cpnumber = document.getElementById("cellphoneno").value;
	var bday = document.getElementById("birthday").value;
	var cnum = document.getElementById("citinum").value;
	var adress = document.getElementById("adress").value;
	var zsign = document.getElementById("zodiacsign").value;
	var zyear = document.getElementById("zodiacyear").value;
	var bdweek = document.getElementById("bdow").value;
	
	setCookie("firstname", fname, 365);
	
	var err = false;
	
	if(fname == ""){
		document.getElementById("err_fn").innerHTML = "please enter your firstname";
		err = true;
	}else{
		document.getElementById("err_fn").innerHTML = "";	
	}
	
	if(lname == ""){
		document.getElementById("err_ln").innerHTML = "please enter your lastname";
		err = true;
	}else{
		document.getElementById("err_ln").innerHTML = "";	
	}
	
}

function switchingPage(){
	document.getElementById("page1").style.display = "none";
	document.getElementById("page2").style.display = "block";
}

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
