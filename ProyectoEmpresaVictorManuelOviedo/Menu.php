<html>
    <?php
include './ControlSesion.php';
$sesion=new ControlSesion();
$sesion->gestiona();
?>
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                //$("#content").load("bewelcome.html");        
                $("#alta").click(function () {
                    $("#content").load("Form_altaUsuario.php");
                });
                $("#baja").click(function () {
                    $("#content").load("Form_bajaUsuario.php");
                });
                $("#modifica").click(function () {
                    $("#content").load("Form_modificarUsuario.php");
                });
                $("#listado").click(function () {
                    $("#content").load("Form_listarUsuario.php");
                });
                $("#altad").click(function () {
                    $("#content").load("Form_altaDepartamento.php");
                });
                $("#bajad").click(function () {
                    $("#content").load("Form_bajaDepartamento.php");
                });
                $("#listadod").click(function () {
                    $("#content").load("Form_listarDepartamento.php");
                });
                $("#altaem").click(function () {
                    $("#content").load("Form_altaEmpleado.php");
                });
                $("#bajaem").click(function () {
                    $("#content").load("Form_bajaEmpleado.php");
                });
                $("#modificaem").click(function () {
                    $("#content").load("Form_modificarEmpleado.php");
                });
                $("#listadoem").click(function () {
                    $("#content").load("Form_listarEmpleado.php");
                });
                $("#altapr").click(function () {
                    $("#content").load("Form_altaProducto.php");
                });
                $("#bajapr").click(function () {
                    $("#content").load("Form_bajaProducto.php");
                });
                $("#modificapr").click(function () {
                    $("#content").load("Form_modificarProducto.php");
                });
                $("#listadopr").click(function () {
                    $("#content").load("Form_listarProducto.php");
                });
                $("#altapa").click(function () {
                    $("#content").load("Form_altaPago.php");
                });
                $("#bajapa").click(function () {
                    $("#content").load("Form_bajaPago.php");
                });
                $("#modificapa").click(function () {
                    $("#content").load("Form_modificarPago.php");
                });
                $("#listadopa").click(function () {
                    $("#content").load("Form_listarPago.php");
                });
                $("#altape").click(function () {
                    $("#content").load("Form_altaPedido.php");
                });
                $("#bajape").click(function () {
                    $("#content").load("Form_bajaPedido.php");
                });
                $("#modificape").click(function () {
                    $("#content").load("Form_modificarPedido.php");
                });
                $("#listadope").click(function () {
                    $("#content").load("Form_listarPedido.php");
                });
                $("#altac").click(function () {
                    $("#content").load("Form_altaCliente.php");
                });
                $("#bajac").click(function () {
                    $("#content").load("Form_bajaCliente.php");
                });
                $("#modificac").click(function () {
                    $("#content").load("Form_modificarCliente.php");
                });
                $("#listadoc").click(function () {
                    $("#content").load("Form_listarCliente.php");
                });
            });
        </script>
    </head>
    <body>
        <?php $tipo = $_GET["tipo"]; ?>
        <nav class="navbar navbar-inverse" style="margin-bottom: 0px">
            <div class="container-fluid">
                <div class="navbar-header" style="margin-right: 3%">
                    <a class="navbar-brand" href="Index.php">Maderid S.A.</a>
                </div>
                <div <?php if ($tipo == "Normal") {echo "hidden";} ?>>
                    <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Usuarios <span class="caret"/></button>
                        <ul class="dropdown-menu" id="menus">
                            <li id='lialta'><a id="alta">Alta Usuario</a></li>
                            <li id="libaja"><a id="baja">Dar Baja Usuario</a></li>
                            <li id="limodifica"><a id="modifica">Modificar Usuario</a></li>
                            <li id="lilistado"><a id="listado">Listado Usuarios</a></li>
                        </ul>
                    </div>
                    <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Departamentos <span class="caret"/></button>
                        <ul class="dropdown-menu" id="menus">
                            <li id='lialtad'><a id="altad">Alta Departamento</a></li>
                            <li id="libajad"><a id="bajad">Dar Baja Departamento</a></li>
                            <li id="lilistadod"><a id="listadod">Listado Departamentos</a></li>
                        </ul>
                    </div>
                    <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Empleados <span class="caret"/></button>
                        <ul class="dropdown-menu" id="menus">
                            <li id='lialtaem'><a id="altaem">Alta Empleado</a></li>
                            <li id="libajaem"><a id="bajaem">Dar Baja Empleado</a></li>
                            <li id="limodificaem"><a id="modificaem">Modificar Empleado</a></li>
                            <li id="lilistadoem"><a id="listadoem">Listado Empleados</a></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Productos <span class="caret"/></button>
                        <ul class="dropdown-menu" id="menus">
                            <li id='lialtapr'><a id="altapr">Alta Producto</a></li>
                            <li id="libajapr"><a id="bajapr">Baja Producto</a></li>
                            <li id="limodificapr"><a id="modificapr">Modificar Producto</a></li>
                            <li id="lilistadopr"><a id="listadopr">Listar Productos</a></li>
                        </ul>
                    </div>
                    <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pagos <span class="caret"/></button>
                        <ul class="dropdown-menu" id="menus">
                            <li id='lialtapa'><a id="altapa">Nuevo Pago</a></li>
                            <li id="libajapa"><a id="bajapa">Borrar Pago</a></li>
                            <li id="limodificapa"><a id="modificapa">Modificar Pago</a></li>
                            <li id="lilistadopa"><a id="listadopa">Listar Pagos</a></li>
                        </ul>
                    </div>
                    <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pedidos <span class="caret"/></button>
                        <ul class="dropdown-menu" id="menus">
                            <li id='lialtape'><a id="altape">Nuevo Pedido</a></li>
                            <li id="libajape"><a id="bajape">Borrar Pedido</a></li>
                            <li id="limodificape"><a id="modificape">Modificar Pedido</a></li>
                            <li id="lilistadope"><a id="listadope">Listar Pedidos</a></li>
                        </ul>
                    </div>
                    <div class="dropdown" style="float: left; margin-right: 10px">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Clientes <span class="caret"/></button>
                        <ul class="dropdown-menu dropdown-menu-right" id="menus">
                            <li id='lialtac'><a id="altac">Alta Cliente</a></li>
                            <li id="libajac"><a id="bajac">Dar Baja Cliente</a></li>
                            <li id="limodificac"><a id="modificac">Modificar Cliente</a></li>
                            <li id="lilistadoc"><a id="listadoc">Listado Clientes</a></li>
                        </ul>
                    </div>
            </div>
        </nav>
        <div>
            <div class="col-md-9" id="content" style="padding-top: 20px"></div>
        </div>
    </body>
    
</html>
