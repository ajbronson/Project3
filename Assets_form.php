<?php
// definições de host, database, usuário e senha
$host = "192.168.2.8:3306";
$db   = "test";
$user = "userMISM";
$pass = "123456";

$con = new mysqli($host, $user, $pass, $db) or die (mysql_error());
$query = $con->query("SELECT id,address,city FROM Offices");

?>



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
        <h2>Add Assets</h2>
            
            <form id="Assets" name="Assets" method="post" action="Assets.php?flag=" >
                <input id="id" name="id" type="hidden" placeholder="ID" maxlength="10" value="0" /><br>
                <table border="0">
                    <tr>
                        <td>Org. Tag</td>
                        <td><input id="org_tag" name="org_tag" type="text" placeholder="Organizational Tag" maxlength="10" value="TAG123" /></td>
                    </tr>
                    <tr>
                        <td>Office Location</td>
                        <td>
                             <select name="idlocation">
                                  <?php while($reg = $query->fetch_array()) { ?>
                                  <option value="<?php echo $reg["id"]?>"> <?php echo $reg["city"]." | ".$reg["address"] ?> </option>
                                  <?php }?>
                             </select>  
                        </td>

                    </tr>
                    <tr>
                        <td>Manufacturer</td>
                        <td><input id="manufacturer" name="manufacturer" type="text" placeholder="Manufacturer" value="CISCO" /> </td>
                    </tr>
                    <tr>
                        <td>Manufacturer #</td>
                        <td><input id="manufacturer_numb" name="manufacturer_numb" type="text" placeholder="Manufacturer Part#" value="ABC123456" /></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="description" cols="40" rows="5" placeholder="Description" >Roouter brandnew</textarea></td>
                    </tr>
                    <tr>
                        <td>Implementade Date</td>
                        <td><input id="date" name="date" type="date" placeholder="Implemented Date" value="01/01/2010" /></td>
                    </tr>
                    <tr>
                        <td>Maintance Notes</td>
                        <td><textarea name="notes" cols="40" rows="5" placeholder="Maintance Notes" >Very goodcondition</textarea></td><p></p>
                    </tr>
                    <tr> <td></td>
                        <td><input name="add" type="submit" id="add" value="Save Asset" /></td>
                    </tr>
                </table>
            </form>

















</body>
</html>





