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
    <title>Início</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="../css/home.css">
    <?php
        require_once '../controllers/student.controller.php';
        require_once '../controllers/post.controller.php';

        $allPosts = getPosts();
    ?>
</head>
<body>
    <div class="mainContainer">
        <div class="lefContainer">
            <div class="profile">
                <?php
                    $user = getStudent($_SESSION['username']);

                    $row = mysqli_fetch_assoc($user);
                    echo '<p id="name">'.$row['nome'].'</p>
                    <p id="at">@'.$row['username'].'</p>';
                    
                ?>
            </div>

            <div class="menu">
                <a id="item" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    <p>INÍCIO</p>
                </a>

                <a id="item" href='profile.php?username=<?php echo $row['username'] ?>' >
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    <p>PERFIL</p>
                </a>

                <a id="item" href="config.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                    <p>CONFIGURAÇÃO</p>
                </a>

                <a id="item" href="../controllers/auth.controller.php?logout=true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <p>SAIR</p>
                </a>
            </div>
        </div>
        <div class="centerContainer">
            <form class="messageForm" method="POST" action="../controllers/post.controller.php?newPost=true&id_aluno=<?php echo $row['id_aluno'] ?>">
                <textarea name="message" maxlength="256" minlength="3" cols="30" rows="10"></textarea>
                <button type="submit">Enviar</button>
            </form>
                <?php    
                    while($post = mysqli_fetch_assoc($allPosts)) {
                        echo "
                            <span id='".$post['id_publicacao']."'></span>
                            <div class='post'>
                                <p id='name'>".$post['aluno_nome']."</p>
                                <p id='message'>".$post['conteudo']."</p>
                                <div class='interactions'>";

                            if($_SESSION['username'] == $post['aluno_username']) {
                                echo "
                                <a id='button' onclick='document.getElementById(`id01`).style.display=`block`'>Likes (".$post['n_likes'].")</a>
                                <a id='button' onclick='document.getElementById(`id02`).style.display=`block`'>Comentários (".$post['n_comentarios'].")</a>
                                <a id='button' href='../controllers/post.controller.php?deleteFromHome=true&id_pub=".$post['id_publicacao']."'>Apagar</a>
                                <a id='button'>Editar</a>
                                ";
                            } else {
                                echo "
                                <a id='button' href='../controllers/interaction.controller.php?addLike=true&id_pub=".$post['id_publicacao']."&id_aluno=".$row['id_aluno']."'>Likes (".$post['n_likes'].")</a>
                                <a id='button'>Comentários (".$post['n_comentarios'].")</a>
                                ";
                            }
                                
                        echo "
                        </div>
                        </div>
                        ";
                    }
                ?>
        </div>

        <!--  MODAL DA LISTA DE LIKES  -->
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h3>Likes</h3>
                <table>
                <?php
                        $students = getStudents();

                        while($row = mysqli_fetch_assoc($students)) {
                            echo '
                            <tr>
                            <td>
                                <div class="friend" onclick="location.href=`profile.php?username='.$row['username'].'`;" >
                                    <p id="name">'.$row['nome'].'</p>
                                    <p id="at">@'.$row['username'].'</p>
                                </div>
                                </td>
                            </tr>
                            ';
                        }
                    ?>
                </table>
            </div>
            </div>
        </div>

        <!--  MODAL DOS COMENTÁRIOS  -->
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h3>Comentários</h3>
                <form class="commentForm" method="POST" action="../controllers/post.controller.php?newComment=true&id_aluno=<?php echo $row['id_aluno'] ?>">
                    <textarea name="title" maxlength="256" minlength="3" cols="30" rows="10"></textarea>
                    <button type="submit">Comentar</button>
                </form>
                <table>
                <?php
                        $students = getStudents();

                        while($row = mysqli_fetch_assoc($students)) {
                            echo '
                            <tr>
                            <td>
                                <div class="friend" onclick="location.href=`profile.php?username='.$row['username'].'`;" >
                                    <p id="name">'.$row['nome'].'</p>
                                    <p id="at">@'.$row['username'].'</p>
                                </div>
                                </td>
                            </tr>
                            ';
                        }
                    ?>
                </table>
            </div>
            </div>
        </div>

        <div class="rightContainer">

            <div class="friends">
                <?php
                    $students = getStudents();

                    while($row = mysqli_fetch_assoc($students)) {
                        echo '<div class="friend" onclick="location.href=`profile.php?username='.$row['username'].'`;" >
                            <p id="name">'.$row['nome'].'</p>
                            <p id="at">@'.$row['username'].'</p>
                        </div>';
                    }
                ?>
            </div>

            <?php
                if(isset($chat)) {
                    echo '
                    <div class="chat">
                        <p class="chat_user">@user</p>
                        <div class="chat_content">
                            <div class="chat_messages">
                                <div class="msg">Olá</div>
                                <div class="msg_usr">Olá</div>
                            </div>
                            <div class="msg_input">
                                <input type="text" placeholder="Digite alguma coisa...">
                                <button class="send">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    ';
                
                } else {
                echo '
                <div class="chat">
                    <p class="chat_user">Escolha um usuário!</p>
                    <div class="chat_content">
                        <p id="emptyChat">Você ainda não iniciou uma conversa :(</p>
                    </div>
                </div>
                ';
                }
            ?>

        </div>
    </div>
</body>
</html>