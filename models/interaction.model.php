<?php
    require_once '../config/database.php';

    function retrieveAllLikesByPost($id_post) {
        $con = connectDb();

        $sql = "SELECT * FROM publicacao WHERE id_publicacao=".$id_post.";";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function insertInteraction($id_publicacao, $id_aluno) {
        $con = connectDb();

        $sql = "INSERT INTO interacao (id_publicacao, id_aluno) VALUES (".$id_publicacao.", ".$id_aluno.");";

        $result = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con) == 0 ) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }
?>