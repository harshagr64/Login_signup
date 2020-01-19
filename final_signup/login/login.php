<?php session_start();
include("../db.php");


if(isset($_COOKIE['token_name'])){
	$cook=$_COOKIE['token_name'];
	$sql=mysqli_query($con,"select * from token2 where token='$cook'");
	$data=mysqli_fetch_array($sql);
	$user=$data['user'];
	$s=mysqli_query($con,"select * from token2 where user='$user' and token='$cook'");
	$row=mysqli_num_rows($s);
	if($row==1){
		$_SESSION['username']=$user;
		$_SESSION['toke_n']=$cook;
		?>
        <script>
		window.location="../panel/index.php";
		</script>
        <?php
	}	
}
?>
<html>
<head>
<script src="../../signup/js/jquery-3-4-1.js"></script>
<script>
$(document).ready(function(e) {
    $("#submit").click(function(e) {
        var user=$("#user").val();
		var pass=$("#pass").val();
		$.ajax({
			type:"POST",
			url:"submit1.php",
			data:{user:user,pass:pass},
			success: function(html){
				$("#data").text("");
				$("#data").prepend(html);
			}
			});
    });
});

</script>
</head>
<body>
<input type="text" name="user" placeholder="Username" id="user">
<input type="password" name="pass" placeholder="Password" id="pass">
<input type="submit" name="submit" value="LOGIN" id="submit">
<span id="data"></span>
</body>
</html>


