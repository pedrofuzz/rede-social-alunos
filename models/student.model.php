<?php
    require_once '../config/database.php';

    function retrieveStudents() {
        
        $con = connectDb();

        $sql = "SELECT * FROM aluno;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveStudent($username) {
        $con = connectDb();

        $sql = "SELECT * FROM aluno WHERE username='".$username."';";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function insertStudent($username, $nome, $cpf, $cep, $senha) {
        $con = connectDb();

        $sql = "INSERT INTO aluno(username, nome, cpf, cep, senha) VALUES ('".$username."', '".$nome."', '".$cpf."', '".$cep."', '".$senha."')";

        $result = mysqli_query($con, $sql);
        
        if($con->error) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }

    function updateStudent($cpf) {
        $con = connectDb();

        $sql = "";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na atualização!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function deleteStudent($cpf) {
        $con = connectDb();

        $sql = "DELETE FROM aluno WHERE cpf='".$cpf."';";

        $result = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con)==0) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }
?>