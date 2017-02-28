<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("product");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
</head>
<body>
<?php
if(isset($_POST['sub']))
{
	$email=$_POST['email'];
	$pass=$_POST['pas'];
	$_SESSION['ses']=$email;
	$data=mysql_query("select * from admin where Email='$email' AND Password='$pass'");
	$qs=mysql_num_rows($data);
	if($qs==true)
	{
		echo "<script>location='home.php'</script>";
	}
	else
	{
		echo "<script>alert('envalid emailid and password')</script>";
	}
}
?>
<table bgcolor="lightblue" cellpadding="10px">
<tr><td colspan="2" align="center"><h1>Login Form</h1></td></tr>
<form method="post" action="">
<tr><td>Email</td><td><input type="text" name="email"></td></tr>
<tr><td>password</td><td><input type="password" name="pas"></td></tr>
<tr><td colspan="2"><input type="submit" name="sub" value="submit"></td></tr>
</form>
</table>
</body>
</html>