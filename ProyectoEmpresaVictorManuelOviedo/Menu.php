<html>
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
                    quitarActive(true);
                    $('#lialta,#vlialta').addClass('active');
                });
                $("#baja,#vbaja").click(function () {
                    $("#content").load("Form_bajaUsuario.php");
                    quitarActive(true);
                    $('#libaja,#vlibaja').addClass('active');
                });
                $("#modifica,#vmodifica").click(function () {
                    $("#content").load("Form_modificarUsuario.php");
                    quitarActive(true);
                    $('#limodifica,#vlimodifica').addClass('active');
                });
                $("#listado,#vlistado").click(function () {
                    $("#content").load("Form_listarUsuario.php");
                    quitarActive(true);
                    $('#lilistado,#vlilistado').addClass('active');
                });
                $("#altad,#valtad").click(function () {
                    $("#content").load("Form_altaDepartamento.php");
                    quitarActive(false);
                    $('#lialtad,#vlialtad').addClass('active');
                });
                $("#bajad,#vbajad").click(function () {
                    $("#content").load("Form_bajaDepartamento.php");
                    quitarActive(false);
                    $('#libajad,#vlibajad').addClass('active');
                });
                $("#modificad,#vmodificad").click(function () {
                    $("#content").load("Form_modificarDepartamento.php");
                    quitarActive(false);
                    $('#limodificad,#vlimodificad').addClass('active');
                });
                $("#listadod,#vlistadod").click(function () {
                    $("#content").load("Form_listarDepartamento.php");
                    quitarActive(false);
                    $('#lilistadod,#vlilistadod').addClass('active');
                });
//                $(".navbar-brand").click(function () {
//                    $("#content").load("bewelcome.html");
//                    quitarActive();
//                    $('#lialta,#vlialta').addClass('active');
//                });
                $("#content").load("bewelcome.html");
            });

            function quitarActive(val) {
                if(val){
                    $('#lialta,#libaja,#limodifica,#lilistado').removeClass('active');
                }else{
                    $('#lialtad,#libajad,#limodificad,#lilistadod').removeClass('active');
                }
                
            }
        </script>
    </head>
    <body>
<?php $tipo=$_GET["tipo"]; ?>
        <nav class="navbar navbar-inverse" style="margin-bottom: 0px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="Index.php">Maderid S.A.</a>
                </div>
                <div <?php if($tipo=="Normal"){echo "hidden";} ?>>
                    <ul class="nav navbar-nav">
                        <li id='lialta'><a id="alta">Alta Usuario</a></li>
                        <li id="libaja"><a id="baja">Dar Baja Usuario</a></li>
                        <li id="limodifica"><a id="modifica">Modificar Usuario</a></li>
                        <li id="lilistado"><a id="listado">Listado Usuarios</a></li>
                    </ul>
                </div>
                <div <?php if($tipo=="Admin"){echo "hidden";} ?>>
                    <ul class="nav navbar-nav">
                        <li id='lialtad'><a id="altad">Alta Departamento</a></li>
                        <li id="libajad"><a id="bajad">Dar Baja Departamento</a></li>
                        <li id="limodificad"><a id="modificad">Modificar Departamento</a></li>
                        <li id="lilistadod"><a id="listadod">Listado Departamentos</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <div>
                <div class="col-sm-1" style="padding: 0px">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div <?php if($tipo=="Normal"){echo "hidden";} ?>>
                                <ul class="nav navbar-nav verticalmenu" >
                                    <li id='lialta'><a id="valta">Alta Usuario</a></li><br/>
                                    <li id="libaja"><a id="vbaja">Dar Baja Usuario</a></li><br/>
                                    <li id="limodifica"><a id="vmodifica">Modificar Usuario</a></li><br/>
                                    <li id="lilistado"><a id="vlistado">Listado Usuarios</a></li><br/>
                                </ul>
                            </div>
                            <div <?php if($tipo=="Admin"){echo "hidden";} ?>>
                                <ul class="nav navbar-nav verticalmenu" >
                                    <li id='lialtad'><a id="valtad">Alta Depto</a></li><br/>
                                    <li id="libajad"><a id="vbajad">Dar Baja Depto</a></li><br/>
                                    <li id="limodificad"><a id="vmodificad">Modificar Depto</a></li><br/>
                                    <li id="lilistadod"><a id="vlistadod">Listado Depto</a></li><br/>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-9" id="content" style="padding-top: 20px"></div>
            </div>
    </body>
</html>