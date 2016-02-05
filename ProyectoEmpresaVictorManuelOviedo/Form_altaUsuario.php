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
                        } else {
                            $("#texto").text("")
                        }
                        sigue = false;
                    }
                });
            }

            function comprobar() {
                if (!sigue) {
                    alert("comprueba los campos");
                }else{
                    $.ajax({
                    type: "POST",
                    url: "Procesa_altaUsuario.php",
                    data: {Login: $("#Login").val(),Pass: $("#pass").val(),Name: $("#name").val(),Surname: $("#surname").val(),Type: $("#tipo").val(),Question: $("#question").val(),Answer: $("#answer").val()}
                }).done(function (msg) {
                    $("#muestra").html(msg);
                });
                }
                return false;
            }
        </script>
    </head>
    <body>
        <div id="muestra">
            <form method="POST" action="" onsubmit="return comprobar()" name="form">
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
        </div>
    </body>
</html>

