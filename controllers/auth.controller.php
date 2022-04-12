<?php
    SESSION_START();
    require_once '../config/database.php';
    require_once './student.controller.php';

    // Função para realizar a autenticação
    function authenticate($username, $senha) {
        if($user = getStudent($username)) {

            $usr = mysqli_fetch_assoc($user);

            $hash = $usr['senha'];

            $verify = password_verify($senha, $hash);  // Verificação da senha criptografada

            if ($verify) {
                return 1;
            } else {
                return 0;
            }
            
        } else {
            return 0;
        }
    }

    // função para realizar Logout
    function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['logout']);
        header('Location: /rede-social-trabalho2');
    }

    // Gatilho para função de login
    if(isset($_POST['login'])) {  
        $username = $_POST['username'];
        $senha = $_POST['senha'];
        if(authenticate($username, $senha)) {
            $_SESSION['username'] = $username;
            header('Location: /rede-social-trabalho2/views/home.php');
        } else {
            logout();
        }
    }

    // Gatilho para função de logout
    if(isset($_GET['logout'])) {
        logout();
    }
    

?>