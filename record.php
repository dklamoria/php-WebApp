<?php
include('sess.php');
mysql_connect("localhost","root","");
?>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script>
function data(t)
{
	location='record.php?db='+t;
}
function table(t,no)
{
	location='record.php?db='+no+'&tab='+t;
}
function edit(db,tab,no)
{
	location='edit.php?db='+db+'&tab='+tab+'&no='+no;
}
function delet()
{
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("$db");
	$delete=mysql_query("DELETE FROM $data WHERE $no");
	if($delete==true)
	{
		echo "deleted";
	}
	else
	{
		echo "try again";
	}
	
	
	?>
}
</script>
</head>
<body>
	<div class="main">
	<?php
	include('header.php');
	?>
	<div class="content">
    Select database:<select onChange="data(this.value)">
    <option>select database</option>
	<?php
	$data=mysql_query("SHOW DATABASES");
	while($rec=mysql_fetch_row($data))
	{
		echo "<option>$rec[0]</option>";
	}
	?>
    <?php
	if(isset($_REQUEST['db']))
	{
	$db=$_REQUEST['db'];
    echo "</select><br>
    Select database:<select onChange=table(this.value,'$db')>";
	?>
    <option>select table</option>
	<?php
	$data=mysql_query("SHOW TABLES FROM	$db");
	while($rec=mysql_fetch_row($data))
	{
		echo "<option>$rec[0]</option>";
	}
	}
	?>
    </select>
    <table border=1 width="100%">
    <?php
	if(isset($_REQUEST['$db']))
	{
	$db=$_REQUEST['db'];
	$tab=$_REQUEST['tab'];
	mysql_select_db("$db");
	$data=mysql_query("select * from $tab");
	$no=mysql_num_fields($data);
	echo "<tr bgcolor='blue'><Td colspan=3></td>";
	for($i=0;$i<$no;$i++)
	{
		$s=mysql_field_name($data,$i);
		echo "<th>$s</th>"; 
	}}
echo "</tr>";
$col=1;
while($rec=mysql_fetch_row($data))
	{
		if($col%2==0)
		{
			$color="#ccc";
		}
		else
		{
			$color="#999";
		}
	$col++;
echo "<tr bgcolor='$color'><td><input type='checkbox' name='check'></td><td><img src=image/edit.png onclick=edit('$db','$tab',$rec[0])></td><td><img src=image/delete16.gif onclick=delet()></td>";
		for($i=0;$i<$no;$i++)
		{
			echo "<td>$rec[$i]</td>";
		}
		echo "</tr>";
	}
	?>
</table>
</div>
</div>
</body>
</html>