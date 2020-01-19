<?php session_start(); include("../db.php");
$user=$_SESSION['username'];
$token=$_SESSION['toke_n'];
if($user){
	$s=mysqli_query($con,"select * from token2 where user='$user' and token='$token'");
	$row=mysqli_num_rows($s);
	if($row==1){
	}else{
		?>
        <script>
		window.location="../login/login.php";
		</script>
        <?php
	}
}else{
	?>
    <script>
	window.location="../login/login.php";
	</script>
    
    <?php
}


?>