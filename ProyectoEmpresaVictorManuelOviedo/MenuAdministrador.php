<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#alta,#valta").click(function () {
                    $("#content").load("Form_altaUsuario.php");
                    quitarActive();
                    $('#lialta,#vlialta').addClass('active');
                });
                $("#baja,#vbaja").click(function () {
                    $("#content").load("Form_bajaUsuario.php");
                    quitarActive();
                    $('#libaja,#vlibaja').addClass('active');
                });
                $("#modifica,#vmodifica").click(function () {
                    $("#content").load("Form_modificarUsuario.php");
                    quitarActive();
                    $('#limodifica,#vlimodifica').addClass('active');
                });
                $("#listado,#vlistado").click(function () {
                    $("#content").load("Form_listarUsuario.php");
                    quitarActive();
                    $('#lilistado,#vlilistado').addClass('active');
                });
//                $(".navbar-brand").click(function () {
//                    $("#content").load("bewelcome.html");
//                    quitarActive();
//                    $('#lialta,#vlialta').addClass('active');
//                });
                $("#content").load("bewelcome.html");
            });

            function quitarActive() {
                $('#lialta,#libaja,#limodifica,#lilistado').removeClass('active');
            }
        </script>
    </head>
    <body>

        <nav class="navbar navbar-inverse" style="margin-bottom: 0px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="Index.php">Maderid S.A.</a>
                </div>
                <ul class="nav navbar-nav">
                    <li id='lialta'><a id="alta">Alta Usuario</a></li>
                    <li id="libaja"><a id="baja">Dar Baja Usuario</a></li>
                    <li id="limodifica"><a id="modifica">Modificar Usuario</a></li>
                    <li id="lilistado"><a id="listado">Listado Usuarios</a></li>
                </ul>
            </div>
        </nav>

        <div>
            <div>
                <div class="col-sm-1" style="padding: 0px">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div>
                                <ul class="nav navbar-nav verticalmenu" >
                                    <li id='lialta'><a id="valta">Alta Usuario</a></li><br/>
                                    <li id="libaja"><a id="vbaja">Dar Baja Usuario</a></li><br/>
                                    <li id="limodifica"><a id="vmodifica">Modificar Usuario</a></li><br/>
                                    <li id="lilistado"><a id="vlistado">Listado Usuarios</a></li><br/>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-9" id="content" style="padding-top: 20px"></div>
            </div>
    </body>
</html>