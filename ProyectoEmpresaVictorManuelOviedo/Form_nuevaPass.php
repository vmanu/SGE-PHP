<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="libs/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            function compruebaMismaPass(){
                var dev=false;
                if($("#pass1").val()==$("#passv").val()&&$("#pass1").val()!=""){
                    dev=true;
                }else{
                    $("span").text("Contraseñas no coinciden o estan vacias").css("color","red").prop("class","col-xs-12").css("text-align","center").show();
                }
                return dev;
            }
            
            function quitaTexto() {
                $("span").hide();
            }
        </script>
        <style>
            input{
                margin-bottom: 6px;
            }
        </style>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "empresa";
            $log=$_POST["login"];
            $respuesta=$_POST["answer"];
            $respuestaBD="";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "select pregunta,respuesta from usuarios where login='".$log."'";
            $result = mysqli_query($conn, $sql);
            while ($fila = mysqli_fetch_array($result)) {
                $respuestaBD=$fila['respuesta'];
            }
            if($respuesta==$respuestaBD){
                echo "<div><form class='form-horizontal' role='form' method='POST' action='Procesa_cambiaPassword.php' onsubmit='return compruebaMismaPass()'>
                      <input class'col-xs-12' type='hidden' id='login' name='login' <?php echo value='$log'?>/>
                      <div class='form-group'>
                        <label class='control-label col-xs-4'></label>
                        <div class='col-xs-4'> Password:&nbsp
                        <input type='text' id='pass1' name='pass1'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='control-label col-xs-4'></label>
                        <div class='col-xs-4'> Confirmar password:&nbsp
                        <input type='text' id='passv' name='passv'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='control-label col-xs-4'></label>
                        <div class='col-xs-4'>
                        <input type='submit' id='confirmation' value='Acepto' onblur='quitaTexto()'>
                        </div>
                      </div>
                      </form><span/></div>";
            }else{
                echo "Contacte con el Administrador, para que pueda darte de alta";
            }
        ?>
    </body>
    
</html>