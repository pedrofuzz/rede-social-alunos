<?php
    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: /rede-social-trabalho2/views/home.php');
    } else {
        header('Location: /rede-social-trabalho2/views/login.php');
    }
?>