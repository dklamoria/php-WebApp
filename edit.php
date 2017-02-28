<?php
include('sess.php');
mysql_connect("localhost","root","");
?>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script>
function fun(t)
{
	location='insert.php?q='+t;
}
function table(tab,db)
{
	location='insert.php?tab='+tab+'&q='+db;
}
</script>
</head>
<body>
<div class="main">
<?php
include('header.php');
?>
	<div class="content">
    <?php
        if (isset($_POST['sub']))
		{
		 $no=$_REQUEST['no'];
		 $db=$_REQUEST['db'];
		$tab=$_REQUEST['tab'];
		 $id=$_POST['id'];
		 $name=$_POST['name'];
		 $address=$_POST['add'];
		 $contact=$_POST['cont'];
		 mysql_select_db("$db");
		 $a=mysql_query("UPDATE $tab SET `id`='$id',`name`='$name',`address`='$address',`contact`='$contact' WHERE id=$no");
		 if($a==true)
		 {
		 echo "inserted";
		 }
		 else
		 {
			 echo "try again";
		 }
		}
		 ?>

    <?php
		$db=$_REQUEST['db'];
		$tab=$_REQUEST['tab'];
		$no=$_REQUEST['no'];
		mysql_select_db("$db");
		$data=mysql_query("select * from $tab where id=$no");
		$rec=mysql_fetch_row($data);
		echo '<form method="post">
		id:<input type="text" name="id" value='.$rec[0].'><br>
		name:<input type="text" name="name" value='.$rec[1].'><br>
		address:<input type="text" name="add" value="'.$rec[2].'"><br>
		contact:<input type="text" name="cont" value='.$rec[3].'><br>
		<input type="submit" name="sub" value="submit">
		</form>';
		?>
        	</div>
</div>
</body>
</html>