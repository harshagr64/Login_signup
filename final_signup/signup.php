<?php 


?>
<html>
<head>
<script src="js/jquery-3-4-1.js"></script>
<script>
$(document).ready(function(e) {
    $("#submit").click(function(e) {
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       var user=$("#user").val();
	   var name=$("#name").val();
	   var email=$("#email").val();
	   var pass=$("#pass").val();
	   if(email.match(mailformat)){
		   return true;
	   }
	   else 
	   {
		   alert("You have Entered invalid Email");
		   $("#email").val("");
		   return false;
	   }
	   $.ajax({
		   type:"POST",
		   url:"submit.php",
		   data:{user:user,pass:pass,email:email,name:name},
		   success:function(html){
			   $("#data").text("");
			   $("#data").prepend(html);
		   }
	   });
    });
});
</script>
</head>
<body>
<div class="username" style="width:auto;height:auto;float:left"><input type="text" name="user" placeholder="Username" id="user"/><br><span id="val"></span></div>
<input type="text" name="name" placeholder="Name" id="name"/>
<input type="text" name="email" placeholder="Email" id="email"/><span id="mail">
<input type="password" name="pass" placeholder="Password" id="pass"/>
<input type="submit" name="submit" value="submit" id="submit"/>
<span id="data"></span>
</body>
</html>