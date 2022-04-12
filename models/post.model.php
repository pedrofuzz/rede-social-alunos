<?php
    require_once '../config/database.php';

    function retrievePosts() {
        $con = connectDb();

        $sql = "SELECT P.*, A.username as aluno_username, A.nome as aluno_nome FROM publicacao P, aluno A WHERE P.id_aluno=A.id_aluno;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrievePost($id_publicacao) {
        $con = connectDb();

        $sql = "SELECT * FROM publicacao WHERE id_publicacao='{$id_publicacao}';";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function retrieveUserPosts($username) {
        $con = connectDb();

        $sql = "SELECT P.*, A.nome as aluno_nome FROM publicacao P, aluno A WHERE username='".$username."' AND P.id_aluno=A.id_aluno;";

        $result = mysqli_query($con, $sql);

        if($con->error) {
            echo "Houve um erro na consulta SQL!";
        } else {
            return $result;
        }

        mysqli_close($con);
    }

    function insertPost($id_aluno, $data, $conteudo) {
        $con = connectDb();

        $sql = "INSERT INTO publicacao(id_aluno, data, conteudo)
                VALUES (".$id_aluno.", ".$data.", '".$conteudo."');";

        $resul = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con)==0) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }

    function deletePost($id_publicacao) {
        $con = connectDb();

        $sql = "DELETE FROM publicacao WHERE id_publicacao='{$id_publicacao}';";

        $result = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con)==0) {
            return 0;
        } else {
            return 1;
        }

        mysqli_close($con);
    }
?>