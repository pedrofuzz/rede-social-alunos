<?php

require_once '../config/database.php';
require_once '../models/student.model.php';

function getStudents() {
    return retrieveStudents();
}

function getStudent($username) {
    return retrieveStudent($username);
}

function createStudent($username, $nome, $cpf, $cep, $senha) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);  //Criptagrafia da senha

    if(insertStudent($username, $nome, $cpf, $cep, $hash)) {
        return 1;
    } else {
        return 0;
    }
}

function delStudent($username) {
    if($user = getStudent($username)) {

        $usr = mysqli_fetch_assoc($user);
        return deleteStudent($usr['cpf']);
    } else {
        return 0;
    }
    
}

// Gatilho para função de registrar um novo usuário
if(isset($_POST['signin'])) {
    if(createStudent($_POST['username'], $_POST['nome'], $_POST['cpf'], $_POST['cep'], $_POST['senha'])) {
        header('Location: /rede-social-trabalho2/views/login.php');
    } else {
        header('Location: /rede-social-trabalho2/views/register.php');
    }
}

// Gatilho para função de deletar um usuário
if(isset($_GET['delete'])) {
    if(delStudent($_GET['username'])) {
        unset($_GET['delete']);
        unset($_GET['username']);
        header('Location: /rede-social-trabalho2/views/login.php');
    } else {
        unset($_GET['delete']);
        unset($_GET['username']);
        header('Location: /rede-social-trabalho2/views/profile.php?username='.$_GET['username']);
    }
}

?>