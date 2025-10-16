<?php include "../app/config/conexao.php";

$sql = "SELECT * from PRODUTOS";
$result = mysqli_query($conn, $sql);
$produtos = $result ? $result->fetch_all(mode: MYSQLI_ASSOC) : [];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Produtos</h1>
    <?php if (count($produtos) === 0): ?>

    <?php else: ?>
        <div class="produtos">
            <?php foreach ($produtos as $p): ?>
                <div class="produto">
                    <img src="https://placehold.co/200" alt="">
                    <h2><?= $p['nome'] ?></h2>
                    <p><?= $p['preco'] ?></p>
                    <p><?= $p['qunatidade'] ?></p>
                    <p><?= $p['descricao'] ?></p>
                    <a href="./editar.php?id<?= $p['id'] ?>">Editar</a>
                </div>
            <?php endforeach ?>
        </div>

    <?php endif ?>

</body>

</html>