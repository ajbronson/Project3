<?php
   session_start();
   unset($_SESSION["login"]);
   unset($_SESSION["senha"]);
   
   echo 'Thank you for using our system!';
   header('Refresh: 2; URL = index.php');
?>