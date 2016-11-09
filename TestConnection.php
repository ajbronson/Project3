<?php
// definições de host, database, usuário e senha
$host = "192.168.2.8:3306";
$db   = "test";
$user = "userMISM";
$pass = "123456";


$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($db, $con);
$query = sprintf("SELECT * FROM test");
$dados = mysql_query($query, $con) or die(mysql_error());
$linha = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);
?>


<html>
	<head>
	<title>Showing Offices</title>
</head>
<body>
	<?php
	echo "a name should apper here:<br>";
	echo "<h1>";
	echo $linha['name']; 
	echo "</h1>";
	?>

</body>
</html>
