<?php
mysql_connect("localhost","root","");
?>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script>
function change(no)
{
	location='insert.php?data1='+no;
}
function change1(no)
{
	location='insert.php?data2='+no;

}

</script>
</head>
<body>
<div class="main">
<?php
include('header.php');
?>
Select Database: <select name="select" onChange="change(this.value)">
    <?php
		$d=mysql_query("SHOW DATABASES");
		while($rec=mysql_fetch_row($d))
		{
			echo "<option value=$rec[0]>$rec[0]</option>";
		}
	?>
    </select>
    <br>
	
	<form method="post" action="">
    Select Table:<select name="select" onChange="change1(this.value)">
    <?php
	$db=$_REQUEST['data1'];
	
	mysql_query("use $db");
		$t= mysql_query("SHOW TABLES");
	while($rec=mysql_fetch_row($t))
		{
			echo "<option value=$rec[0]>$rec[0]</option>";
		}
	?>
    </select>
	</form>
	


	<?php
	$tb=$_REQUEST['data2'];
	mysql_query("use product");
	$x = mysql_query("desc $tb");
	echo $x."<br>";
	while($rec=mysql_fetch_row($x))
		{
			echo $rec[0]."<br>";
			
		}
		
	?>
	<form method="post" action="">
	<input type="text" name="id" />
	<input type="text" name="name" />
	<input type="text" name="add" />
	<input type="text" name="cont" />
	<input type="submit" name="insert" value="insert" style="width:auto">
	</form>
	<?php
	$tb=$_REQUEST['data2'];
	if(isset($_POST['insert']))
	{
	$a = $_POST['id'];
	$b = $_POST['name'];
	$c = $_POST['add'];
	$d = $_POST['cont'];
	
	mysql_query("insert into $tb values('$a','$b','$c','$d')");
	}
	?>
	
</div>
</body>
</html>