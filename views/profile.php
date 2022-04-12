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
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/profile.css">

    <?php
        require_once '../controllers/student.controller.php';
        require_once '../controllers/post.controller.php';

        $user = getStudent($_GET['username']);
        $userPosts = getPostsByUser($_GET['username']);

        $usr = mysqli_fetch_assoc($user);

        if($_GET['username'] == $_SESSION['username']){
            $owner = true;
        } else {
            $owner = false;
        }
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
                <h2>Seus Posts</h2>
            </center>
            <div class="posts">
                <?php    
                    while($post = mysqli_fetch_assoc($userPosts)) {
                        echo "
                            <div class='post'>
                                <p id='name'>".$post['aluno_nome']."</p>
                                <p id='message'>".$post['conteudo']."</p>
                                <div class='interactions'>";

                            if($owner) {
                                echo "
                                <a id='button' href='../controllers/post.controller.php?delete=true&id_pub=".$post['id_publicacao']."'>Apagar</a>
                                <a id='button'>Editar</a>
                                ";
                            } else {
                                echo "
                                <a id='button'>Likes (".$post['n_likes'].")</a>
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
        </div>
    </div>
</body>
</html>