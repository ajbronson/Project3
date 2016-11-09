<?php
	$host = "192.168.2.8:3306";
	$db   = "test";
	$user = "userMISM";
	$pass = "123456";

$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($db, $con);
?>


<html>
	<head>
	<title>Delete Assets</title>
</head>
<body>

<?php
    $id = $_GET['id'];
	mysql_query("DELETE FROM assets	 WHERE id = {$id}", $con) or die(mysql_error());
	echo "<script>alert('Asset Excluded')</script>";
	//include("Assets_consulta.php");
?>
<script>window.location = 'Assets_consulta.php';</script>


</body>
</html>




