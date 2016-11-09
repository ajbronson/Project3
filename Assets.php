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

	$flag = $_GET['flag']; // if flag=true then add else update
	$id= $_POST ["id"];
	$org_tag= $_POST ["org_tag"];
	$idlocation= $_POST ["idlocation"];
	$manufacturer= $_POST ["manufacturer"];
	$manufacturer_numb= $_POST ["manufacturer_numb"];
	$description= $_POST ["description"];
	$date= $_POST ["date"];
	$notes= $_POST ["notes"];



	$conexao = mysql_connect("192.168.2.8:3306","userMISM","123456"); //localhost é onde esta o banco de dados.
	if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
	 
	$banco = mysql_select_db('test',$conexao); //nome da tabela que deseja que seja inserida os dados cadastrais
	if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
	 	 
	if ((bool)$flag) {
		$query = "update  `assets` 
			set `org_tag` ='$org_tag', 
			 `idlocation` ='$idlocation', 
			 `manufacturer`='$manufacturer', 
			 `manufacturer_numb`='$manufacturer_numb', 
			 `description`='$description', 
			 `date`='$date', 
			 `notes`='$notes'
			 where `id`= '$id'";
	} 	 
	else{
	  	$query = "INSERT INTO `assets` ( `org_tag` , `idlocation` , `manufacturer`, `manufacturer_numb`, `description`, `date`, `notes`)
		VALUES ('$org_tag','$idlocation','$manufacturer','$manufacturer_numb','$description','$date','$notes')";
	}
	
	mysql_query($query,$conexao);

	echo "<script>alert('The Asset was included sucessfully!')</script>";
	include("homepage.php");


	?>
</body>
</html>