<?php

class ConectorBaseDatos {
    private $server="localhost";
    private $user="root";
    private $pass="";
    private $db="empresa";
     
    private function getConnection(){
        return new mysqli($this->server, $this->user, $this->pass, $this->db);
    }
     
    public function ejecutar($query, $texto,$textoCorrecto){
        $connection=$this->getConnection();
        if ($connection->connect_error){
          die("Connection failed: " . $connection->connect_error);
        }
        $result=$connection->query($query);
        if ($result) {
            echo $textoCorrecto;
            echo $texto;
        } else {
            echo "Error: " . $query . "<br>" . $connection->connect_error;
        }
        mysqli_close($connection);
        return $result;
    }
}
