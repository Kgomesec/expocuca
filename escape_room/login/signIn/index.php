<?php
include('../../conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
        echo "<script>alert(\"Preencha seu email\")</script>";
    } else if (strlen($_POST['senha']) == 0){
        echo "<script>alert(\"Preencha sua senha\")</script>";;
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
    
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../../index.php");

        } else {
            echo "<script>alert(\"Falha ao logar! Usuário ou senha incorretos\")</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room | Entrar</title>
    <link rel="stylesheet" href="../../assets/css/signIn.css">
</head>

<body>
    <div class="center_content">
        <img src="../../assets/images/logonerds.png" class="logonerds">
        <form action="" method="POST" class="form">
            <div class="form-content">
                <label for="email">Email</label>
                <input type="text" name="email" id="email"> 
                <span class="erroUser" style="color: red; font-size: 7pt; margin: 0 0 0 10px; display: none;">Preencha com seu usuario cadastrado!</span>
            </div>
            <div class="form-content">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
                <span class="erroPass" style="color: red; font-size: 7pt; margin: 0 0 0 10px; display: none;">Preencha sua senha!</span>
            </div>
            <div class="submit">
                <button class="button" type="submit">Entrar</button>
            </div>
        </form>
        <img src="../../assets/images/logo_CA.png" class="logoCA">
    </div>
</body>

</html>