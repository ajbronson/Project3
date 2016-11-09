<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Assets!</title>
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
	// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
	$address= $_POST ["Address"];
	$city= $_POST ["City"];
	$zipcode= $_POST ["zipcode"];
	$contactname= $_POST ["Name"];
	$phone= $_POST ["Phone"];


	$conexao = mysql_connect("192.168.2.8:3306","userMISM","123456"); //localhost é onde esta o banco de dados.
	if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
	 
	$banco = mysql_select_db('test',$conexao); //nome da tabela que deseja que seja inserida os dados cadastrais
	if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
	 	 
	$query = "INSERT INTO `Offices` ( `address` , `city`, `zipcode`, `name`, `phone`)
	VALUES ('$address','$city','$zipcode','$contactname','$phone')";

	mysql_query($query,$conexao);

	echo "<script>alert('The new Office was included sucessfully!')</script>";
	include("homepage.php");


	?>
</body>
</html>