<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lab05 Page2</title>
	<link rel="stylesheet" media="screen" href="style.css">
    <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css">
    <script type="text/javascript" src="validate_from_input.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.datetimepicker.js"></script>

    <script type="text/javascript">
		$(document).ready(function() {
			var province = "<?php echo $_POST["province"];?>";
			var birthday = "<?php echo $_POST["birthday"];?>"; 
			var gender = "<?php echo $_POST["gender"];?>"; 
			
			var d = new Date();
			var currentYear = d.getFullYear();
			var year = birthday.split('/');
			if(currentYear - year[2] < 13){
				$("body").css("background",'url("http://www.pixelstalk.net/wp-content/uploads/2016/05/Pictures-download-desktop-kids-wallpapers.jpg")');	
				$("#motto").css("font-family", 'sans-serif');
			}else if(gender == 'male'){
				$("body").css("background",'url("http://www.duriancorp.com/wp-content/uploads/2015/01/bg-even-comming.jpg")');
			}else if(gender == 'female'){
				$("body").css("background",'url("https://farm4.staticflickr.com/3582/3413077928_a06c18a652_o_d.jpg")');
			}
			
			$.ajax({
            	url : "motto/"+(province + ".txt"),
            	dataType: "text",
            	success : function (data) {
					console.log(data);
                	document.getElementById("motto").innerHTML = data;	
            	}	
        	});
			
			$.ajax({ 
				url : "sign/" + province + ".png", 
				cache: true,
				processData : false,
			}).always(function(){
				$('#sign').attr('src',("sign/" + province+'.png'));	
			}); 
		});
 	</script>
</head>

<body>
	<div class="page2" id="page2">
    	<center><img id="sign" src="" alt="province" style="width:128px;height:128px;"><center>
    	<h3 id="motto"></h3>
    </div>
</body>
</html>