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
	location='table.php?data='+no;
}
</script>
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
    <br>
    <?php
	$qs=$_REQUEST['data'];
	if($qs!=NULL)
	{
		echo '<form method="post" action="field.php">
		<input type="hidden" name="data" value='.$qs.'>
		Create Table<input type="text" name="ta" placeholder="Enter the table name"> 
		<input type="text" name="No" placeholder="Enter the number">
		<input type="submit" name="create" value="Go">
		</form>';
	}
	?>
    <span id="name"></span>
    </div>
    <div class="delet">
    <h1>Delete table</h1>
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
    <?php
	if(isset($_POST['dell']))
	{
		$tab=$_POST['tab'];
		mysql_select_db("$qs");
		$a=mysql_query("DROP TABLE $tab");
		if($a==true)
		{
			echo "deleted";
		}
		else
		{
			echo "again";
		}
	}
	?>
    <form method="post" action="">
    Select Database: <select name="tab">
    <?php
		$qs=$_REQUEST['data'];
		$d=mysql_query("SHOW TABLES FROM $qs"); 
		while($rec=mysql_fetch_row($d))
		{
			echo "<option value=$rec[0]>$rec[0]</option>";
		}
	?>
    </select>
    <input type="submit" name="dell" value="deleted">
    </form>
    
    </div>
</div>
</div>
</body>
</html>