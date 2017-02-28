<?php
mysql_connect("localhost","root","");
?>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="main">
<?php
include('header.php');
?>
<div class="content">
	<div class="create">
    <h1>Create database</h1>
    <hr>
	<?php
	if(isset($_POST['sub']))
	{
		$db=$_POST['db'];
		$data=mysql_query("create database $db");
		if($data==true)
		{
			echo "<script>alert('database has been created')</script>";
		}
		else
		{
			echo "<script>alert('database has been already created')</script>";
		}
	}
	?>
    <form method="post" action="">
    	Database name: <input type="text" name="db"><input type="submit" name="sub" value="create">
    </form>
    </div>
    <div class="delet">
    <h1>Delete database</h1>
    <hr>
    <?php
	if(isset($_POST['del']))
	{
		$del=$_POST['select'];
		$delet=mysql_query("DROP DATABASE $del");
		if($delet==true)
		{
			echo "<script>alert('database has been deleted')</script>";
		}
		else
		{
			echo "<script>alert('try again')</script>";
		}
	}
	?>
    <form method="post" action="">
    Select Database: <select name="select">
    <?php
		$d=mysql_query("SHOW DATABASES");
		while($rec=mysql_fetch_row($d))
		{
			echo "<option value=$rec[0]>$rec[0]</option>";
		}
	?>
    </select>
    <input type="submit" name="del" value="deleted">
    </form>
    </div>
</div>
</div>
</body>
</html>