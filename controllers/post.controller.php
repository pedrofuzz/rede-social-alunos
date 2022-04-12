<?php
    require_once '../models/post.model.php';

    function getPosts() {
        return retrievePosts();
    }

    function getPostsByUser($username) {
        return retrieveUserPosts($username);
    }

    function createPost($id_aluno, $data, $conteudo) {
        return insertPost($id_aluno, $data, $conteudo);
    }

    function removePost($id_publicacao) {
        return deletePost($id_publicacao);
    }

    // Gatilho para função de deletar uma publicação
    if(isset($_GET["delete"])) {
        removePost($_GET['id_pub']);
        unset($_GET['id_pub']);
        unset($_GET['delete']);
        header('Location: /rede-social-trabalho2/views/profile.php');
    }

    // Gatilho para função de deletar uma publicação pela página Home
    if(isset($_GET["deleteFromHome"])) {
        removePost($_GET['id_pub']);
        unset($_GET['id_pub']);
        unset($_GET['delete']);
        header('Location: /rede-social-trabalho2/views/home.php');
    }

    // Gatilho para função de criar uma publicação
    if(isset($_GET['newPost'])) {
        if(createPost($_GET['id_aluno'], date('Y-m-d'), $_POST['message'])) {
            unset($_GET['newPost']);
            unset($_POST['message']);
            header('Location: /rede-social-trabalho2/views/home.php');
        } else {
            echo "Houve um erro tente novamente!";
        }
    }

?>