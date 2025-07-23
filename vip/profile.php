<?php 
session_start();
?>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname="vipin";
	// Create connection
	$dbc = mysqli_connect($servername, $username, $password, $dbname);
	if(isset($_SESSION['name'])){
	$name=$_SESSION['name'];
	echo $name;
	$sql="select * from vi where email='".$name."'";
	$res=mysqli_query($dbc,$sql);
	$row=mysqli_fetch_array($res);
	}
?>
<html>
<head>
<style>
</style>
</head>
<body>
<fieldset style="text-align:center;"><legend>Profile</legend>
Name:<?php echo $row['name']?><br>
Email:<?php echo $row['email']?><br>
Password:<?php echo $row['password']?><br>
Repassword:<?php echo $row['repassword']?><br>
Phone:<?php echo $row['number']?><br>
pname:<?php echo $row['pname']?><br>
Address:<?php echo $row['address']?><br>
<button type="button"><a href="edi.php">edit</a></button>
<button type="button"><a href="log.php">logout</a></button>
</fieldset>
</body>
</html>