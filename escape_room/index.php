<?php
include('protect.php');
include('conexao.php');

$id = intval($_SESSION['id']);

$sql_code = "SELECT item1, item2, item3, item4, item5, item6 FROM usuarios WHERE id = $id AND (item1 IS NOT NULL OR item2 IS NOT NULL OR item3 IS NOT NULL OR item4 IS NOT NULL OR item5 IS NOT NULL OR item6 IS NOT NULL);";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

$itensEncontrados = [];

if ($sql_query->num_rows > 0) {
    $row = $sql_query->fetch_assoc();

    foreach ($row as $key => $value) {
        if ($value !== null) {
            $itensNaoNulos[$key] = htmlspecialchars($value);
        }
    }
} else {
    echo "<script>console.log(\"Nenhum item encontrado para o usuário com ID: $id ou todos os itens estão vazios.</script>\"";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room | Nave</title>
    <link href="assets/css/index.css" rel="stylesheet" />
    <script defer src="assets/js/index.js"></script>
</head>

<body>
<header class="header">
        <nav class="nav">
            <img src="assets/images/logonerds.png" class="logonerds">
            <div class="header-direito">
                <a href="logout.php" class="logout"><img src="assets/images/logout.svg"></a>
                <div>
                    <button class="hamburger"></button>
                </div>
            </div>  
            <ul class="nav-list" style="padding: 0;">
                <li><p>Seja Bem vindo à tripulação, <?php echo $_SESSION['nome']; ?></p></li>
                <li>
                    <button type="button" class="btn btn-primary buttons" data-bs-toggle="modal" data-bs-target="#objetivosModal">Objetivo</button> 
                </li>
                <li>
                    <button type="button" class="btn btn-primary buttons" data-bs-toggle="modal" data-bs-target="#agradecimentosModal">Agradecimentos</button> 
                </li>
            </ul>         
        </nav>
    </header>
    <div class="center">
        <div class="nave">
           <img src="assets/images/Illustration13.png" class="nave-img"> 
           <div class="items-content">
                <div class="item item1">
                    <div class="item-container">
                        <?php if (isset($itensNaoNulos['item1'])): ?>
                            <img src="assets/images/items/<?php echo $itensNaoNulos['item1']; ?>" alt="Item 1">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item item2">
                    <div class="item-container">
                        <?php if (isset($itensNaoNulos['item2'])): ?>
                            <img src="assets/images/items/<?php echo $itensNaoNulos['item2']; ?>" alt="Item 2">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item item3">
                    <div class="item-container">
                        <?php if (isset($itensNaoNulos['item3'])): ?>
                            <img src="assets/images/items/<?php echo $itensNaoNulos['item3']; ?>" alt="Item 3">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item item4">
                    <div class="item-container">
                        <?php if (isset($itensNaoNulos['item4'])): ?>
                            <img src="assets/images/items/<?php echo $itensNaoNulos['item4']; ?>" alt="Item 4">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item item5">
                    <div class="item-container">
                        <?php if (isset($itensNaoNulos['item5'])): ?>
                            <img src="assets/images/items/<?php echo $itensNaoNulos['item5']; ?>" alt="Item 5">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item item6">
                    <div class="item-container">
                        <?php if (isset($itensNaoNulos['item6'])): ?>
                            <img src="assets/images/items/<?php echo $itensNaoNulos['item6']; ?>" alt="Item 6">
                        <?php endif; ?>
                    </div>
                </div>
           </div>
        </div>
    </div>


    <div class="modal fade" id="agradecimentosModal" tabindex="-1" aria-labelledby="agradecimentosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agradecimentosLabel">Agradecimentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   Gostaríamos de expressar nossa profunda gratidão a todos os envolvidos no desenvolvimento deste site.<br><br>
                   Agradecemos ao Kauã Gomes (2DA), por sua dedicação e expertise como desenvolvedor, que foi fundamental para transformar nossas ideias em uma plataforma funcional e intuitiva.<br><br>
                   Um agradecimento especial à Melissa Rie Kanzato (2DA), nossa talentosa designer, cuja criatividade e visão estética deram vida ao design do site, proporcionando uma experiência visual agradável e acessível para todos os usuários.<br><br>
                   Por fim, agradecemos ao Arthur da Silva (2DA), responsável pelo banco de dados, por garantir que todas as informações fossem gerenciadas de forma eficaz e segura, permitindo um desempenho confiável da aplicação.<br><br>
                   Gostaríamos também de agradecer a você, nosso usuário, por participar desta experiência. Sua presença e feedback são essenciais para nós e nos motivam a continuar melhorando e inovando.<br><br>
                   Reconhecemos que o site não está exatamente como gostaríamos, devido ao tempo limitado de desenvolvimento. A colaboração e o esforço de cada um foram essenciais para o sucesso deste projeto. Obrigado a todos!<br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="objetivosModal" tabindex="-1" aria-labelledby="agradecimentosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agradecimentosLabel">🚀 Desafio Espacial! 🌌</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você está pronto para uma aventura intergaláctica? 🌠 Embarque na nossa <b>nave espacial</b> e ajude a recuperar <b>objetos perdidos</b> pelos personagens Alien 👽, Kira 🧑‍💻, Neko 🐱 e Yuki 👧! <br><br>
                    🕵️‍♂️ O desafio é simples (mas nem tanto!): há <b>6 QR codes</b> espalhados por toda a ETEC, cada um revelando um ou mais itens perdidos desses personagens. Sua missão é encontrar <b>todos</b>  os QR codes e <b>resgatar os objetos!</b><br><br>
                    💬 <b>Clique em um dos 6 retângulos cinzas</b> que estão dentro da nave para falar com um dos personagens e obter dicas valiosas!<br><br>
                    💡 Ao completar o desafio, você descobrirá a localização secreta para <b>resgatar o prêmio</b> final! 🎁<br><br>
                    💡 <b>Atenção!</b> Mesmo se estiver em grupo, <b>cada participante deve se cadastrar</b> e <b>escanear os QR codes</b> na sua própria conta. Caso contrário, você não receberá o prêmio final! 🎁
                    🔍 Será que você tem o que é preciso para solucionar esse mistério espacial? Junte seus amigos, forme uma equipe e prepare-se para uma caça ao tesouro como nenhuma outra, viajando pelos confins da galáxia sem sair da ETEC! 🌍🚀
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>