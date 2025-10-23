<?php
include "../app/config/conexao.php";

$produto = null;
$erro = null;

$id = $_GET["id"] ?? null;
if ($id == null) {
    die("ID não fornecido");
}

// Busca os dados do produto
$stmt = $conn->prepare("SELECT * FROM PRODUTOS WHERE id = ?");
$stmt->bind_param("i", $id); //tipagem da variavel
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $produto = $resultado->fetch_assoc();
} else {
    // Produto não encontrado
    die("Produto não encontrado");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = trim($_POST["nome"] ?? '');
    $descricao = trim($_POST["descricao"] ?? '');
    $quantidade = trim($_POST["quantidade"] ?? '');
    $preco = trim($_POST["preco"] ?? '');
    
    if ($nome === '' || $descricao === '' || $quantidade === '' || $preco === '') {
        $erro = 'Preencha todos os campos';
    } else {
      
        $preco = (float) $preco;
        $quantidade = (int) $quantidade;
        
        // Atualizando o produto no banco de dados
        $query = "UPDATE PRODUTOS SET nome = ?, descricao = ?, quantidade = ?, preco = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssidi", $nome, $descricao, $quantidade, $preco, $id);

        if ($stmt->execute()) {
            $ok = "Produto atualizado com sucesso!";
            header("Location: index.php");
            exit();
        } else {
            $erro = "Erro ao atualizar o produto";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <h1>Editar Produto</h1>
    <?php if (isset($ok)): ?>
        <p><?= $ok ?></p>
    <?php elseif (isset($erro)): ?>
        <p><?= $erro ?></p>
    <?php endif ?>
    
    <form method="POST">
        <label for="nome">Nome</label>
        <input required type="text" id="nome" name="nome" value="<?= $produto['nome'] ?? '' ?>">
        
        <label for="preco">Preço</label>
        <input required type="number" step="0.01" id="preco" name="preco" value="<?= $produto['preco'] ?? '' ?>">
        
        <label for="quantidade">Quantidade</label>
        <input required type="number" id="quantidade" name="quantidade" value="<?= $produto['quantidade'] ?? '' ?>">
        
        <label for="descricao">Descrição</label>
        <textarea required id="descricao" name="descricao"><?= $produto['descricao'] ?? '' ?></textarea>
        
        <button type="submit">Salvar Alterações</button>
    </form>
</body>

</html>
