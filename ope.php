<?php 
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$con = mysql_connect("192.168.2.8:3306","userMISM","123456") or die ("Sem conexão com o servidor");
$select = mysql_select_db('test',$con) or die("Sem acesso ao DB, Entre em contato com o Administrador, gilson_sales@bytecode.com.br");

// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysql_query("SELECT * FROM `users` WHERE `username` = '$login' AND `pwd`= '$senha'");
$linha = mysql_fetch_assoc($result);

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
$_SESSION['name'] = $linha['name'];

header('location:homepage.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:index.php');
	
	}

?>

