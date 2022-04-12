<?php
    function connectDb() {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'rede-social';

        $con = mysqli_connect($host, $username, $password, $db_name);

        if($con->connect_error){
            die("Houve um erro ao conectar com o banco de dados!");
        } else {
            return $con;
        }

        return $con;
    }
?>