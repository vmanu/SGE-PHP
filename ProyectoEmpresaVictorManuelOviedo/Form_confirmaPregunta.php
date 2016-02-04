<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="libs/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <style>
            input{
                margin-bottom: 6px;
            }
        </style>
        
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "empresa";
            $log=$_GET["login"];
            $pregunta="";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "select pregunta from usuarios where login='".$log."'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $pregunta= $row['pregunta'];
            }
        ?>
    </head>
    <body>
        <div >
            <form class="form-horizontal" role="POST" method="POST" action="Form_nuevaPass.php">
                <input class="col-xs-12" type="hidden" name="login" id="login" value=<?=$log?>>
                <div class="form-group" style="margin-top: 10px">
                  <label class="control-label col-xs-4">Pregunta:</label>
                  <div class="col-xs-4">
                      <input style="width: 100%" name="question" disabled type="text" <?php echo "value='".$pregunta."'"?> />
                  </div>
                </div>
                <div class="form-group" >
                  <label class="control-label col-xs-4">Respuesta:</label>
                  <div class="col-xs-4">
                    <input type="text" class="form-control" id="answer" name="answer">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4"></label>
                    <div class="col-xs-2">
                        <input type="submit" id="accept" value="Acepto">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>