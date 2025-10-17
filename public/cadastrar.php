<?php
include "../app/config/conexao.php";

$ok = null;
$erro = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = trim($_POST["nome"] ?? '');
    $descricao = trim($_POST["descricao"] ?? '');
    $quantidade = trim($_POST["quantidade"] ?? '');
    $preco = trim($_POST["preco"] ?? '');
    if ($nome === '' || $descricao === '' || $quantidade === '' || $preco === '') {
        $erro = 'Preencha os campos';
    } else {
        $preco = str_replace('', '', $preco);
        $preco = (float) $preco;
        $quantidade = (int) $quantidade;
        $query = "Insert into PRODUTOS(nome,descricao,  quantidade, preco)
Values(?, ?, ?, ?);";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssid", $nome, $descricao, $quantidade, $preco);
        if ($stmt->execute()) {
            $ok = "Produto cadastrado com sucesso !";
            header("Location: index.php");
            exit();
        }

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <h1>Cadastrar Produto</h1>
    <?php if ($ok): ?>
    <?php elseif ($erro): ?>
        <p><?= $erro ?></p>

    <?php endif ?>
    <form method="POST">
        <label for="nome">Nome</label>
        <input required type="text" id="nome" name="nome" value="<?= $_POST['nome'] ?? '' ?>">
        <label for="nome">Preço</label>
        <input required type="number" step="0.01" id="preco" name="preco" value="<?= $_POST['preco'] ?? '' ?>">
        <label for="nome">Quantidade</label>
        <input required type="number" id="quantidade" name="quantidade" value="<?= $_POST['quantidade'] ?? '' ?>">
        <label for="nome">Descrição</label>
        <textarea required type="text" id="descricao" name="descricao"
            value="<?= $_POST['descricao'] ?? '' ?>"></textarea>
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>