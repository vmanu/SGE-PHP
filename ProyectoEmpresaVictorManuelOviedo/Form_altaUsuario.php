<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Alta Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            var sigue = false;
            function validaLogin() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_verificacion_login.php",
                    data: {login: $("#Login").val()}
                }).done(function (msg) {
                    if (msg == "true") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                        $("#texto").text("Login Valido").css("color", "lime");
                        sigue = true;
                    } else {
                        if ($("#Login").val() != "") {
                            $("#texto").text("Login Invalido").css("color", "red");
                        }else{
                             $("#texto").text("")
                        }
                        sigue = false;
                    }
                });
            }

            function comprobar() {
                if (!sigue) {
                    alert("comprueba los campos");
                }
                return sigue;
            }
        </script>
    </head>
    <body>
        <form method="POST" action="Procesa_altaUsuario.php" onsubmit="return comprobar()">
            <div>Login: <input type="text" name="Login" id="Login" onblur="validaLogin()" required/> Contraseña: <input type="password" name="Pass" id="pass" required/></div>
            <div id="texto"></div>
            <div>Nombre: <input type="text" name="Name" id="name" required/> Apellidos: <input type="text" name="Surname" id="surname" required/></div>
            <div>Pregunta: <div >
                    <select style="width: 15%" name="Question" id="question">
                        <option value="¿Nombre del padre?">¿Nombre del padre?</option>
                        <option value="¿Nombre de la madre?">¿Nombre de la madre?</option>
                        <option value="¿Cual fue tu primer colegio?">¿Cual fue tu primer colegio?</option>
                        <option value="¿Como se llamaba tu primera mascota?">¿Como se llamaba tu primera mascota?</option>
                    </select>
                </div> Respuesta: <input type="text" name="Answer" id="answer" required/></div>
            <div>Tipo: Administrador: <input type="radio" checked="" name="Type" value="Administrador" id="tipo"/> Normal: <input type="radio" name="Type" value="Normal" id="tipo"/></div>
            <div><input type="submit" id="submit"/></div>
        </form>
    </body>
</html>

