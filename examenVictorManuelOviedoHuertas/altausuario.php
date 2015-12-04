<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Altausuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            var date = new Date();
            var dia = date.getDate();
            var mes = date.getMonth();
            var anyo = date.getFullYear();

            $(document).ready(function () {
                $("#id").focus();
            });

            function compruebaFecha() {
                var diaguardado = $("#fecha").val();
                var anno = diaguardado.substring(0, diaguardado.indexOf("-")) * 1;
                var month = diaguardado.substring(diaguardado.indexOf("-") + 1, diaguardado.lastIndexOf("-")) * 1;
                var day = diaguardado.substring(diaguardado.lastIndexOf("-") + 1) * 1;
                if (anno < anyo || (anno === anyo && month === (mes + 1) && day === dia)) {
                    alert("Fecha no es posterior a la actual");
                } else {
                    if (anno===anyo&&month < (mes + 1)) {
                        alert("Fecha no es posterior a la actual");
                    }else{
                        if(anno===anyo&&month===(mes+1)&&day<dia){
                            alert("Fecha no es posterior a la actual");
                        }
                    }
                }
            }

            function compruebaPattern(id) {
                var cadena = $(id).val();
                var regpat;
                if (cadena === "") {
                    alert("No ha introducido valor alguno");
                    $(id).focus();
                } else {
                    if (cadena.length == 9) {
                        regpat = new RegExp("^EV[A-Za-z]{3}([0-9]|[A-Za-z]){4}$");
                        if (!regpat.test(cadena)) {
                            alert(cadena + " no está bien formada");
                            $(id).focus();
                        } else {
                            activarDesactivarCampos(false);
                            $("#pass").focus();
                        }
                    } else {
                        alert("Error: ¡La contraseña debe tener 9 caracteres!");
                        $(id).focus();
                    }
                }
            }

            /*function activarDesactivarCampos(valor) {
             $("#name").prop("disabled", valor);
             $("#surname").prop("disabled", valor);
             $("#question").prop("disabled", valor);
             $("#answer").prop("disabled", valor);
             $("#tipo").prop("disabled", valor);
             $("#submit").prop("disabled", valor);
             }*/

            
        </script>
    </head>
    <body>
        <form method="POST" action="Alta-bbdd.php">
            <div>Id: <input type="text" name="Login" id="mid" onblur="compruebaPattern('#mid')" required/> Contraseña: <input type="password" name="Pass" id="pass" required/></div>
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
            <div>Fecha:<input type="date" name="fecha" id="fecha" required onchange="compruebaFecha()"/></div>
            <div><input type="submit" id="submit"/></div>
        </form>
    </body>
</html>

