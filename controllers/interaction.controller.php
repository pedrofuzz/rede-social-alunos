<?php
    require '../models/interaction.model.php';

    function insertLike($id_publicacao, $id_aluno) {
        return insertInteraction($id_publicacao, $id_aluno);
    }

    // Gatilho para função de Adicionar Like
    if(isset($_GET['addLike'])) {
        insertLike($_GET['id_pub'], $_GET['id_aluno']);
        unset($_GET['addLike']);
        unset($_GET['id_publicacao']);
        unset($_GET['id_aluno']);
        header('Location: /rede-social-trabalho2/views/home.php');
    }
?>