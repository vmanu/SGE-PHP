<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Baja Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
    </head>
    <body>
        <form method="POST" action="Procesa_bajaUsuario.php">
            <div>Id: <input type="text" name="Login" id="id" required/> Contraseña: <input type="password" name="Pass" id="pass" required/></div>
            <div><input type="submit" id="submit" value="Dar de baja"/></div>
        </form>
    </body>
</html>


