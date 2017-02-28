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
if(isset($_POST['sub1']))
{
	$num=$_POST['num'];
	$db=$_POST['db'];
	$table=$_POST['table'];
	//echo $num,$db,$table;
	mysql_select_db($db);
	
		$name1=$_POST['name1'];
		$var1=$_POST['var1'];
		$length1=$_POST['length1'];
		$key1=$_POST['key1'];
		$check1=$_POST['check1'];
		
		$name2=$_POST['name2'];
		$var2=$_POST['var2'];
		$length2=$_POST['length2'];

		
		$name3=$_POST['name3'];
		$var3=$_POST['var3'];
		$length3=$_POST['length3'];
		
		
		
		$name4=$_POST['name4'];
		$var4=$_POST['var4'];
		$length4=$_POST['length4'];
	
		$query="CREATE TABLE ".$table."(".$name1." ".$var1."(".$length1.") NOT NULL ".$key1." ".$check1.", ".$name2." ".$var2."(".$length2.") NOT NULL, ".$name3." ".$var3."(".$length3.") NOT NULL, ".$name4." ".$var4."(".$length4.") NOT NULL)";
		$data=mysql_query($query);
		if($data==true)
		{
			echo "inserted";
		}
		else
		{
			echo "try again";
		}
		//echo "CREATE TABLE $table ($name1 $var1($length1) NOT NULL, $name2 $var2($length2) NOT NULL, $name3 $var3($length3) NOT NULL, $name4 $var4($length4) NOT NULL";
	
}
?>
</div>