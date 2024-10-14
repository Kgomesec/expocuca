<?php
include('../../conexao.php');

function verificarEmailHunter($email) {
    $api_key = '6b2ca07863841d40f9ddcbeb3f79fb2f3a2ff87b'; 

    $url = 'https://api.hunter.io/v2/email-verifier?email=' . urlencode($email) . '&api_key=' . $api_key;

    $response = file_get_contents($url);
    $result = json_decode($response, true);

    if (isset($result['data']['result']) && $result['data']['result'] === 'undeliverable') {
        return false; // E-mail inválido
    } else {
        return true; // E-mail válido
    }
}


if(isset($_POST['nome'])  || isset($_POST['email']) || isset($_POST['senha'])) {
    $emailValido = $_POST['email'];

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha =  $mysqli->real_escape_string($_POST['senha']); 

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if(strlen($_POST['nome']) == 0) {
        echo "<script>alert(\"Preencha seu usuário\")</script>";
    } else if(strlen($_POST['email']) == 0) {
        echo "<script>alert(\"Preencha seu email\")</script>";
    } else if(!filter_var($mysqli->real_escape_string($_POST['email']), FILTER_VALIDATE_EMAIL) || !verificarEmailHunter($emailValido)) {
        echo "<script>alert(\"Email inválido\")</script>";
    } else if($quantidade == 1) {
        echo "<script>alert(\"Esse email ja foi utilizado!\")</script>";
    } else if(strlen($_POST['senha']) == 0) {
        echo "<script>alert(\"Preencha sua senha\")</script>";
    } else {

        $sql_code = "INSERT INTO usuarios(nome, email, senha, item1, item2, item3, item4, item5, item6) VALUES ('$nome', '$email', '$senha', null, null, null, null, null, null);";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        header("Location: ../signIn/");
        
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room | Cadastre-se</title>
    <link rel="stylesheet" href="../../assets/css/signUp.css">
</head>
<body>
    <div class="center_content">
        <img src="../../assets/images/logonerds.png" class="logonerds">
        <form action="" method="POST" class="form">
            <div class="form-content">
                <label for="nome">Usuário</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div class="form-content">
                <label for="email">Email</label>
                <input type="text" name="email" id="email"> 
            </div>
            <div class="form-content">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
            </div>
            <div class="submit">
                <button class="button" type="submit">Cadastrar-se</button>
            </div>
        </form>
        <img src="../../assets/images/logo_CA.png" class="logoCA">
    </div>
</body>
</html>