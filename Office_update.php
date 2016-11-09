

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Offices</title>
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
    $host = "192.168.2.8:3306";
    $db   = "test";
    $user = "userMISM";
    $pass = "123456";
    $id = $_GET['id'];
    $con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
    mysql_select_db($db, $con);
    $query = sprintf("SELECT * FROM offices  WHERE id = {$id}");
     //echo "$query";
    $dados = mysql_query($query, $con) or die(mysql_error());
    $linha = mysql_fetch_assoc($dados);
    $total = mysql_num_rows($dados);

?>
<h2>Update Office Location</h2>


    <div class="login-page">
        <div class="form">
            <form id="OfficeForm" name="Offices" method="post" action="Offices.php?flag=TRUE" >
                    <input id="Id" name="Id" type="hidden" placeholder="Id" size="10" maxlength="10"  value="<?php echo $linha ['id']; ?> " ><br>      
                    <input id="Address" name="Address" type="text" placeholder="Address" value="<?php echo $linha ['address']; ?> " ><br>
                    <input id="City" name="City" type="text" placeholder="City" size="100"  value="<?php echo $linha ['city']; ?> " >
                    <input id="zipcode" name="zipcode" type="text" placeholder="Zip Code" size="10" value="<?php echo $linha ['zipcode']; ?> "> <br>
                    <input id="Name" name="Name" type="text" placeholder="Contact Name"  value="<?php echo $linha ['name']; ?> " ><br>
                    <input id="Phone" name="Phone" type="text" placeholder="Phone #"  value="<?php echo $linha ['phone']; ?> " ><br> <p></p>
                    <input name="add" type="submit" id="add" value="Save Office Location" />
            </form>
        </div>
    </div>
</body>
</html>





