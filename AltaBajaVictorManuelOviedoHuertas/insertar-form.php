<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#id").focus();
                activarDesactivarCampos(true);
            });
            function compruebaPattern(procedimiento, id) {
                var cadena = $(id).val();        
                var comprobante;
                var regpat;
                if (cadena === "") {
                    alert("No ha introducido valor alguno");
                    $(id).focus();
                } else {
                    switch (procedimiento) {
                        case 1:
                            regpat = new RegExp("^[A-Za-z]{4}[0-9]{3}$");
                            if (!regpat.test(cadena)) {
                                alert(cadena + " no está bien formada");
                                $(id).focus();
                            }else{
                                activarDesactivarCampos(false);
                                $("#pass").focus();
                            }
                            break;
                        case 2:
                            if(cadena.length>5&&cadena.length<16){
                                regpat = new RegExp("[0-9]");
                                if (!regpat.test(cadena)) {
                                    alert("Error: ¡La contraseña debe contener al menos un digito!");
                                    $(id).focus();
                                } else {
                                    regpat = new RegExp("[a-z]");
                                    if (!regpat.test(cadena)) {
                                        alert("Error: ¡La contraseña debe contener al menos una letra minúscula!");
                                        $(id).focus();
                                    } else {
                                        regpat = new RegExp("[A-Z]");
                                        if (!regpat.test(cadena)) {
                                            alert("Error: ¡La contraseña debe contener al menos una letra mayúscula!");
                                            $(id).focus();
                                        }
                                    }
                                }
                            }else{
                                alert("Error: ¡La contraseña debe tener como mínimo 6 caracteres y como máximo 15!")
                                $(id).focus();
                            }
                            break;
                    }
                }
            }
            
            function activarDesactivarCampos(valor){
                $("#name").prop("disabled",valor);
                $("#surname").prop("disabled",valor);
                $("#question").prop("disabled",valor);
                $("#answer").prop("disabled",valor);
                $("#tipo").prop("disabled",valor);
                $("#submit").prop("disabled",valor);
            }
            
            function comprobar(){
                return confirm("Seguro que desea guardar estos datos?");
            }

        </script>
    </head>
    <body>
        <form method="POST" action="insertar-bbdd.php" onsubmit="return comprobar()">
            <div>Id: <input type="text" name="Login" id="id" onblur="compruebaPattern(1, '#id')"/> Contraseña: <input type="password" name="Pass" id="pass" onblur="compruebaPattern(2, '#pass')"/></div>
            <div>Nombre: <input type="text" pattern="[A-Za-z]{1,}" name="Name" id="name" required/> Apellidos: <input type="text" name="Surname" id="surname" pattern="[A-Za-z]{1,}" required/></div>
            <div>Pregunta: <div >
                      <select style="width: 15%" name="Question" id="question">
                          <option value="Nombre del padre">¿Nombre del padre?</option>
                          <option value="Nombre de la madre">¿Nombre de la madre?</option>
                          <option value="primer colegio">¿Cuál fue tu primer colegio?</option>
                          <option value="primera mascota">¿Cómo se llamaba tu primera mascota?</option>
                          <option value="Lugar de nacimiento">Lugar de nacimiento</option>
                      </select>
                  </div> Respuesta: <input type="text" name="Answer" id="answer" required/></div>
            <div>Tipo: Administrador: <input type="radio" checked="" name="Type" value="Administrador" id="tipo"/> Normal: <input type="radio" name="Type" value="Normal" id="tipo"/></div>
            <div><input type="submit" id="submit"/></div>
        </form>
    </body>
</html>

