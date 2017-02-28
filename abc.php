<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>

<div class="main">
<?php
mysql_connect("localhost","root","");
mysql_select_db("product");


?>



<?php
include('header.php');
?>
<div class="content">
<?php
if(isset($_POST['send']))
for($i=1; $i<=4; $i++)
{
	$n=$_POST['name'.$i];
	$l=$_POST['list'.$i];
	$f=$_POST['length'.$i];
	$ln=$_POST['prim'.$i];
	$ch=$_POST['check'.$i];
	echo "$n,$l,$f,$ln,$ch";
}
?>
</div>
</div>

</body>
</html