<?php
// definições de host, database, usuário e senha
$host = "192.168.2.8:3306";
$db   = "test";
$user = "userMISM";
$pass = "123456";


$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($db, $con);
$query = sprintf("SELECT * FROM Offices");
$dados = mysql_query($query, $con) or die(mysql_error());
$linha = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);
?>


<html>
	<head>
	<title>Showing Offices</title>
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
	<h2 style="text-align: center;">Showing Offices</h2> 
	<?php
		echo '<table border="1" align="center">';
		echo '<td><b>Address</b></td>' ;
		echo '<td><b>City</b></td>' ;
		echo '<td><b>Zip Code</b></td>' ;
		echo '<td><b>Name</b></td>' ;
		echo '<td><b>Phone Number</b></td>';

		if($total > 0) {
			do {
				echo '<tr>';
	?>
				<td><?=$linha['address']?> </td>
				<td><?=$linha['city']?> </td>
				<td><?=$linha['zipcode']?> </td>
				<td><?=$linha['name']?> </td> 
				<td><?=$linha['phone']?> </td>
				<td><a href="Office_delete.php?id=<?=$linha['id']?>">Delete</a></td>
				<td><a href="Office_update.php?id=<?=$linha['id']?>">Update</a></td>
	<?php
			echo '</tr>';
			}while($linha = mysql_fetch_assoc($dados));
		// fim do if 
		}
		echo '</table>';
	?>


<p>	</p>

<div style="text-align: center">
	<a href="homepage.php" align="center">Home</a>   |   <a href="offices.html">Add New Office</a>
</div>



</body>
</html>
<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?>
