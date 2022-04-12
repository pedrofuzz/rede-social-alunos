<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <div class="mainContainer">
        <form class="loginForm" action="../controllers/student.controller.php" method="POST">
            <div>
            <label>Nome:</label>
            <input type='text' name='nome' required>
            </div>

            <div>
            <label>Username:</label>
            <input type='text' name='username' required>
            </div>

            <div>
            <label>CPF:</label>
            <input type='text' name='cpf' required>
            </div>

            <div>
            <label>CEP:</label>
            <input type='text' name='cep' required>
            </div>

            <div>
            <label>Senha:</label>
            <input type='password' name='senha' required>
            </div>

            <input class='button' type='submit' value='Entrar' name="signin"/>
        </form>
        
        <a href="../index.php">Fazer login</a>
    </div>
</body>
</html>