<?php

class ControlSesion {

    public function login(){
        $_SESSION["autentificado"] = "SI";
    }
    
    public function gestiona() {
        session_start();
        if ($_SESSION["autentificado"] != "SI") {
            header("Location: Index.php");
        } else {
            $fechaGuardada = $_SESSION["ultimoAcceso"];
            $ahora = date("Y-n-j H:i:s");
            $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
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
