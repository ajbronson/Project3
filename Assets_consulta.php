<?php
// definições de host, database, usuário e senha
$host = "192.168.2.8:3306";
$db   = "test";
$user = "userMISM";
$pass = "123456";


$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($db, $con);
//$query = sprintf("SELECT * from  assets");
$query = sprintf("SELECT assets.id as id,org_tag,manufacturer,manufacturer_numb,description,date,notes,address,city from assets LEFT OUTER JOIN offices ON assets.idlocation=offices.id");
$dados = mysql_query($query, $con) or die(mysql_error());
$linha = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);
?>


<html>
<head>
	<title>Showing Assets</title>
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
	<h2 style="text-align: center;">Showing Assets</h2> 
	<?php
		echo '<table border="1" align="center">';
		echo '<td><b>Organizational Tag</b></td>' ;
		echo '<td><b>Office Location</b></td>' ;
		echo '<td><b>Manufacturer</b></td>' ;
		echo '<td><b>Manufacturer Part</b></td>' ;
		echo '<td><b>Description</b></td>';
		echo '<td><b>Date Implemented</b></td>';
		echo '<td><b>Maintance Notes</b></td>';



		if($total > 0) {
			do {
				echo '<tr>';
	?>
				<td><?=$linha['org_tag']?> </td>
				<td><?=$linha['city']." | ".$linha['address']?> </td> 
				<td><?=$linha['manufacturer']?> </td>
				<td><?=$linha['manufacturer_numb']?> </td>
				<td><?=$linha['description']?> </td>
				<td><?=$linha['date']?> </td>
				<td><?=$linha['notes']?> </td>
				<td><a href="Assets_delete.php?id=<?=$linha['id']?>">Delete</a></td>
				<td><a href="Assets_update.php?id=<?=$linha['id']?>">Update</a></td>
	<?php
			echo '</tr>';
			}while($linha = mysql_fetch_assoc($dados));
		// fim do if 
		}
		echo '</table>';
	?>


<p>	</p>


<div style="text-align: center">
	<a href="homepage.php">Home</a>   |   <a href="Assets_form.php">Incluir Asset</a>
</div>



</body>
</html>
<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?>
