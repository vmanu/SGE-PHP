<?php

class ControlSesion {

    public function gestiona() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION["autentificado"] != "SI") {
            header("Location: Index.php");
        } else {
            $ahora = date("Y-n-j H:i:s");
            if (isset($_SESSION["ultimoAcceso"])) {
                $fechaGuardada = $_SESSION["ultimoAcceso"];
            } else {
                $fechaGuardada = $ahora;
            }
            $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
            //$tiempo_transcurrido=400;
            if ($tiempo_transcurrido >= 600) {
                session_unset();
                session_destroy(); // destruyo la sesión 
                header("Location: index.php"); //envío al usuario a la pag. de autenticación 
            } else {
                $_SESSION["ultimoAcceso"] = $ahora;
            }
        }
    }

}
