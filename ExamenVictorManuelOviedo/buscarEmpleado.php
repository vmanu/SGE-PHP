<html>
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            function comprobar(){
                var filtro;
                alert($("#loc").val());
                if($("#loc").val()=="on"){
                    alert($("#loc").val());
                }
            }
        </script>
    </head>
    <body>
        <form method="POST" action="Form_muestraFiltro.php" >
            <input id="nombre" type="checkbox" name="Nombre"/> Nombre<br/>
            <input id="loc" type="checkbox" name="Localizacion"/> Localizacion<br/>
            <input type="submit" value="filtrar"/>
        </form>
    </body>

</html>

