<?php
include('sess.php');
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
<?php
if(isset($_POST['create']))
{
	$db=$_POST['data'];
	$table=$_POST['ta'];
	$number=$_POST['No'];
	echo "$db,$table,$number<br>";
	echo"<table><form method='post' action='show.php'>";
	echo"<input type='hidden' name='num' value='$number'>
	<input type='hidden' name='db' value='$db'>
	<input type='hidden' name='table' value='$table'>";
	for($i=1;$i<=$number;$i++)
	{
		echo "<Tr><td><input type='text' name='name$i'></td><Td><select name='var$i'><option value='INT'>INT</option><option value='VARCHAR'>VARCHAR</option><option value='CHAR'>CHAR</option></select></td><td><input type='text' name='length$i'></td><td><select name='key$i'><option value='PRIMARY KEY'>primary</option><option>Unique</option><option>INDEX</option></select></td><td><input type='checkbox' name='check$i' value='AUTO_INCREMENT'></td></tr>";
		
	}
	echo "<tr><td><input type='submit' name='sub1' value='submit'></td></tr>";
	echo "</form></table>";
}
?>


</div>
</div>
</body>
</html>