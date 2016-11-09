
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Homepage</title>

    <?php  
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $fname   = $_SESSION['name'];
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

        <div class="login-page">
            <div class="formHome">
            <h1>Welcome,<?php echo " ".$fname ?> </h3>
            <h2> What do you to like do today?</h4>
            <p></p>
            <div class="login-page" style="text-align: left">
                <a href="Assets_form.php">Add Assets  </a> <br> 
                <a href="Assets_consulta.php"> Search Assets</a> <br>
                <p></p>
                <a href="Offices.html">Add Offices  </a>  <br>  
                <a href="Office_consulta.php"> Search Offices</a><p></p>
            </div>            
            <p><p><p></p></p></p>
            <a href="logout.php">Logout</a><br>

            </div>
        </div>
</body>
</html>


