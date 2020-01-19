<?php include("db.php");
	$date=date("Y-m-d");
	$time=date("h-i-s");
	$user=$_REQUEST['user'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$s=mysqli_query($con,"select * from fin_sign where user='$user' or email='$email'");
	$row=mysqli_num_rows($s);
	if($row>0){
		?>
        <script>
		alert("Username or Email Id Already Exists");
		window.location="signup.php";
		</script>
        <?php	
	}else{
		$sql=mysqli_query($con,"insert into fin_sign set user='$user',pass='$pass',email='$email',name='$name',date='$date',time='$time'");
		?>
        <script>
        alert("Account Successfully Created \n Press Enter To Login into Your Account");
		window,location="login/login.php";
        </script>
        <?php
		
	}
		



?>