<?php
include('../protect.php');
include('../conexao.php');

sleep(3);
header('Location: ../index.php');
if (isset($_GET['img'])) {
    $img = $_GET['img'];

    $img = basename($img);

    $file_path = "../assets/images/items/" . $img;

    if (file_exists($file_path)) {
        header('Content-Type: image/' . pathinfo($file_path, PATHINFO_EXTENSION));
        
        readfile($file_path);

        $id = intval($_SESSION['id']);
        $imgString = $mysqli->real_escape_string($img);

        if($img == "1_68be1367c224a464804fa8d57dd321d3.png") {
            $sql_code= "UPDATE usuarios SET item1 = '$imgString' WHERE id = $id;";
        } else if($img == "2_1b3339a0532bf07fd2aadf2deef5668b.png") {
            $sql_code= "UPDATE usuarios SET item2 = '$imgString' WHERE id = $id;";
        } else if($img == "3_c88f92e9e8602c16e045f2fe1a5d2383.png") {
            $sql_code= "UPDATE usuarios SET item3 = '$imgString' WHERE id = $id;";
        } else if($img == "4_273910799eacaacec06aba83c9d54906.png") {
            $sql_code= "UPDATE usuarios SET item4 = '$imgString' WHERE id = $id;";
        } else if($img == "5_016c926580c3b4cc7e095059a9f5e8e4.png") {
            $sql_code= "UPDATE usuarios SET item5 = '$imgString' WHERE id = $id;";
        } else if($img == "6_233419d0ca774e67c5edffb9a62998ea.png") {
            $sql_code= "UPDATE usuarios SET item6 = '$imgString' WHERE id = $id;";
        }
        
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        

    } else {
        echo "Imagem não encontrada!";
    }
} else {
    echo "Parâmetro 'img' não foi passado na URL.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room | QrCode</title>
</head>
<body>
    
</body>
</html>