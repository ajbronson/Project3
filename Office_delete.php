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
	<title>Delete Offices</title>
	<?php  
        session_start();

        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }

        $logado = $_SESSION['login'];
    
      ?>	
</head>
<body>

<?php
    $id = $_GET['id'];
	mysql_query("DELETE FROM offices WHERE id = {$id}", $con) or die(mysql_error());
?>
<script>window.location = 'Office_consulta.php';</script>



</body>
</html>




