<?php
session_start();
?>
<?php
$con= mysqli_connect("localhost","root","","vipin");
if(isset($_POST['login']))
{
	$cookie_name=$_POST['email'];
	$cookie_value=$_POST['password'];
	setcookie($cookie_name,$cookie_value,time()+(60*20),"/");
	if(!isset($_COOKIE[$cookie_name]))
	{
		echo "Cookie '" . $cookie_name . "' is not set!";
	$mail=$_POST['email'];
	$pass=$_POST['password'];
	$sql="SELECT * from vi where email='".$mail."' AND password='".$pass."'";
	$run= mysqli_query($con,$sql);
	$row= mysqli_fetch_assoc($run);
if($row)
{
	 $_SESSION['name']=$_POST['email'];
	 echo $_SESSION['name'];
	 echo "login successfully";
	 header('location:profile.php');
}
else
{
	echo "try again";
}
}
}
?>
<!DOCTYPE html>
<html>
<style>
.box{
	background-color:#ffffb3;
	width:300px;
	height:150px;
	margin-top:200px;
	margin-left:30px;
	padding:30px;
}
.i{
	background-image:url("image1.jpg");
}
</style>
<body class="i">
<center>
<form  class="box" name="asd" action="" method="post">
<table>
<tr><th>
<label>Email</label></th>
<td><input type="text" name="email"></td></tr>
<br>
<tr><th>
<label>Password</label></th>
<td><input type="password" name="password"></td></tr>
<tr><th></th><td>
<input type="submit" name="login" value="submit"></td></tr>
<tr><th>
<input type="checkbox"></th>
<td><label>remember me</label></td></tr>
</table>
<a href="form.php">new registration link</a>
</center>
</form>
</body>
</html>