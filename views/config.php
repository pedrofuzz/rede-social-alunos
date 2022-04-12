<?php
    session_start();

    if(isset($_SESSION['username'])) {
        
    } else {
        header('Location: /rede-social-trabalho2/views/login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Configurações</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/config.css">

    <?php
        require_once '../controllers/student.controller.php';

        $user = getStudent($_SESSION['username']);

        $usr = mysqli_fetch_assoc($user);
    ?>
</head>
<body>
    <div class="mainContainer">
        <div class="content">
            <div class="profile">
                <p id="name"><?php echo $usr['nome']; ?></p>
                <p id="at">@<?php echo $usr['username']; ?></p>
            </div>

            <center>
            <h2>Configurações</h2>
            
            
            <div class="menu">
                <a id="item" onclick="document.getElementById('id01').style.display='block'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    <p>APAGAR CONTA</p>
                </a>

                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Tem certeza que deseja continuar?</h3>
                        <p>Essa ação é irreversível</p>
                        <a id="confirm" href="../controllers/auth.controller.php?delete=true&username=<?php echo $usr['username'] ?>">confirmar</a>
                    </div>
                    </div>
                </div>

                <a id="item" href="../controllers/auth.controller.php?logout=true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <p>SAIR</p>
                </a>
            </div>
            
            </center>
            
        </div>
    </div>
</body>
</html>