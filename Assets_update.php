
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Assets</title>
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
    $query = sprintf("SELECT * FROM assets  WHERE id = {$id}");
    //echo "$query";
    $dados = mysql_query($query, $con) or die(mysql_error());
    $linha = mysql_fetch_assoc($dados);
    $total = mysql_num_rows($dados);


    $con = new mysqli($host, $user, $pass, $db) or die (mysql_error());
    $query = $con->query("SELECT id,address,city FROM Offices");

?>
<h2>Update Assets</h2>
    
        
            <form id="Assets" name="Assets" method="post" action="Assets.php?flag=TRUE" >
                <input id="id" name="id" type="hidden" placeholder="ID" maxlength="10" value="<?php echo $linha ['id']; ?> "/> <br>
                <table border="0">
                    <tr>
                        <td>Org. Tag</td>
                        <td><input id="org_tag" name="org_tag" type="text" placeholder="Organizational Tag" maxlength="10" value="<?php echo $linha ['org_tag']; ?> "/></td>
                    </tr>
                    <tr>
                        <td>Office Location</td>
                        <td><select name="idlocation" selected>
                            <?php while($reg = $query->fetch_array()) { ?>
                                <option <?php if($reg["id"] == $linha['idlocation']) echo "selected " ?> value="<?php echo $reg["id"]   ?>"/> <?php echo $reg["city"]." | ".$reg["address"] ?> </option>
                            <?php }?>
                        </select> </td>
                    </tr>
                    <tr>
                        <td>Manufacturer</td>
                        <td><input id="manufacturer" name="manufacturer" type="text" placeholder="Manufacturer" value="<?php echo $linha ['manufacturer']; ?> "/></td>
                    </tr>
                    <tr>
                        <td>Manufacturer #</td>
                        <td><input id="manufacturer_numb" name="manufacturer_numb" type="text" placeholder="Manufacturer Part#" value="<?php echo $linha ['manufacturer_numb']; ?> "></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="description" cols="40" rows="5" placeholder="Description" ><?=$linha['description']?> </textarea></td>
                    </tr>
                    <tr>
                        <td>Implementade Date</td>
                        <td><input id="date" name="date" type="date" placeholder="Implemented Date" value="<?php echo $linha ['date']; ?> "></td>
                    </tr>
                    <tr>
                        <td>Maintance Notes</td>
                        <td><textarea name="notes" cols="40" rows="5" placeholder="Maintance Notes" ><?=$linha['notes']?> </textarea></td><p></p>
                    </tr>
                    <tr> <td></td>
                        <td><input name="add" type="submit" id="add" value="Save Asset" /></td>
                    </tr>
                </table>
            </form>
    
</body>
</html>





