<?php
$servername="localhost";
$username="root";
$password="";
$dBname="vipin";
$con=mysqli_connect($servername,$username,$password,$dBname);

if(isset($_POST['submit']))
{             
	  $sql="select * from vi where email='".$_POST['email']."'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_num_rows($res);
			if($row>=1)
			{
				echo "user already exist";
			}
			else
	{
		
		$name=$_POST['name'];
		$mail=$_POST['email']; 
		$pswd=$_POST['password'];
		$pswd1=$_POST['password1'];
		$num=$_POST['number'];
		$pname=$_POST['pname'];
		$address=$_POST['add'];
	    $sql="INSERT INTO vi( name,email,password,repassword,number,pname,address)VALUES('".$name."','".$mail."','".$pswd."','".$pswd1."','".$num."','".$pname."','".$address."')";
		
		$result=mysqli_query($con,$sql);
			if($result){
				echo "<td style='color:red'>inserted</td>";
				header('location:log.php');
			}
			else{
				echo "<td style='color:red'>try again</td>";
			}
	} 
}
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   body
  {
   background-color:#ccffff;
   height:700px;
  }
</style>
</head>
<body>
<script>
function fn()
{
var a=document.getElementById("n").value;
var b=document.getElementById("em").value;
var atp=b.indexOf("@");
var dotp=b.lastIndexOf(".");
var c=document.getElementById("p1").value;
var d=document.getElementById("p2").value;
var e=document.getElementById("num").value;
if(a=="")
{
alert("name is not filled");
}
if(isNaN(e))
{
alert("your number is wrong");
}
else if(e.length<10||e.length>10)
{
alert("enter 10 number");
}
else
{
}
if (atp<1 || dotp<atp+2 || dotp+2>=b.length)
{
alert("Enter correct email");
}
if(c.length<8)
{
alert("password must contain 8 letters");
}
if(c!=d)
{
alert("password mismatch");
}
}
</script>

<br><br><br><center>
<form action="form.php" method="post" name="vipin">
<table>
<tr>
<th><label> NAME</label></th>
<td><input type="text" name="name" id="vipin"><br><br></td></tr>
<tr>
<th>
<label> EMAIL</label></th>
<td><input type="email" name="email" id="em"><br><br></td><tr>
<tr><th>
<label>Enter PASSWORD</label></th>
<td>
<input type="password" name="password" id="p1"><br><br></td></tr>
<tr><th>
<label>Re-Enter PASSWORD</label></th>
<td>
<input type="password" name="password1" id="p2"><br><br></td><tr>
<tr><th>
<label> PHONE NUM</label></th>
<td>
<input type="number" name="number" id="num"><br><br></td></tr>
<tr><th>
<label> PRODUCT NAME</label></th>
<td>
<input type="text" name="pname" ><br><br></td></tr>
<tr><th>
<label>address</label></th>
<td>
<textarea cols="50" rows="5" name="add"> </textarea></td></tr>
<tr><th></th><td><br>
<button onclick="fn()" name="submit">submit </button></td>
</form></center>
</body>
</html>