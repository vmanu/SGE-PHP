<?php
include './ControlSesion.php';
$sesion=new ControlSesion();
$sesion->gestiona();
?>
<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                modificarCampos();
            });

            function modificarCampos() {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "Procesa_MostrarUsuario.php",
                    data: {login: document.getElementById("Login").innerHTML},
                    error: function (msg) {
                        alert(msg);
                    }
                }).done(function (data) {
                    console.log(data);
                    $("#name").val(data.nombre);
                    $("#surname").val(data.apellidos);
                    $("#tipo").val(data.tipo);
                    $("#answer").val(data.respuesta);
                    switch (data.pregunta) {
                        case "¿Nombre del padre?":
                            $("#pa").prop("checked", "true");
                            break;
                        case "¿Nombre de la madre?":
                            $("#ma").prop("checked", "true");
                            break;
                        case "¿Cual fue tu primer colegio?":
                            $("#cole").prop("checked", "true");
                            break;
                        case "¿Como se llamaba tu primera mascota?":
                            $("#mascota").prop("checked", "true");
                            break;
                    }
                });
                
            }

            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_modificaUsuario.php",
                    data: {Login: document.getElementById("Login").innerHTML, Pass: $("#pass").val(), Name: $("#name").val(), Surname: $("#surname").val(), Type: $("#tipo").val(), Question: $('input[name=Question]:checked', '#form').val(), Answer: $("#answer").val()}
                }).done(function (msg) {
                    $("#muestra").html(msg);
                });
                return false;
            }
        </script>
    </head>
    <body>
        <div id="muestra">
            <form id="form" method="POST" action="" onsubmit="return comprobar()" name="form">
                <div hidden id="Login" onchange="modificarCampos()"><?php echo $_SESSION["user"] ?></div>
                <table>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="Pass" id="pass" />
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" name="Name" id="name" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Apellidos: </td>
                        <td><input type="text" name="Surname" id="surname" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo: </td>
                        <td>
                            <select style="width: 100%" name="Type" id="tipo">
                                <option value="Administrador">Administrador</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pregunta: </td>
                        <td>
                            <div><input type="radio" name="Question" id="pa" class="question" value="¿Nombre del padre?"/>¿Nombre del padre? <br/>
                                <input type="radio" name="Question" id="ma" class="question" value="¿Nombre de la madre?"/>¿Nombre de la madre? <br/>
                                <input type="radio" name="Question" id="cole" class="question" value="¿Cual fue tu primer colegio?" />¿Cual fue tu primer colegio? <br/>
                                <input type="radio" name="Question" id="mascota" class="question" value="¿Como se llamaba tu primera mascota?" /> ¿Como se llamaba tu primera mascota?</div><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>Respuesta: </td>
                        <td><input type="text" name="Answer" id="answer" required/>
                        </td>
                    </tr>
                </table>
                <input type="submit" id="submit" value="Modificar"/>
            </form>
        </div>
    </body>
</html> 