<?php session_start();
include("../db.php");
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
	$s=mysqli_query($con,"select * from fin_sign where user='$user' and pass='$pass'");
	$row=mysqli_num_rows($s);
	if($row==1){
		$date=date("Y-m-d");
		$token=uniqid().date("Y-m-d").time();
		$_SESSION['username']=$user;
		$_SESSION['toke_n']=$token;
		if($sql=mysqli_query($con,"insert into token2 set user='$user',token='$token',date='$date'")){
		setcookie("token_name",$token,time()+86400);
		?>
        <script>
        alert("press Enter to go to Website");
		window.location="../panel/index.php";
        </script>
        <?php
		}	else{
		?>
        	<script>
			alert("Something Went Wrong");
			window.location="login.php";
			</script>
		<?php	
		}
	}else{
		?>
        <script>
        alert("User Does Not Exist");
		window.location="login.php";
        </script>
        <?php
	}











?>