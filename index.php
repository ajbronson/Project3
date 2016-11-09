
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Project3 Login</title>
    <link href="css/Premier.css" rel="stylesheet">
    <script type="text/javascript" src="js/Premier.js"></script>
    <script type="text/javascript">
        function CallForm() {
            var aux = document.getElementById("text_name").value;
            if (aux != 'xx') {
                window.location.href = 'index_branchM.html'
            }
    </script>
</head>
<body>

        <div class="login-page">
            <div class="form">

                <form method="post" action="ope.php" id="formlogin" name="formlogin" >
                    <input type="text" name="login" id="login"  placeholder="Username" /><br />
                    <input type="password" name="senha" id="senha" placeholder="Password" /> <p></p>
                    <input type="submit" value="Login"  />
                </form>

            </div>
        </div>
</body>
</html>


