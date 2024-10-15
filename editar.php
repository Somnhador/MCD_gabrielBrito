<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <script>
    function produtoEditado() {
            alert('PRODUTO EDITADO COM SUCESSO!');
        }
        </script>
</head>

<body>
    <h1>Editar Produto</h1>
    <?php
    require 'conexao.php';
    $id_Produto = $_REQUEST["id_Produto"];
    $dados = [];
    $sql = $pdo->prepare("SELECT * FROM prod WHERE id_Produto = :id_Produto");
    $sql->bindValue(":id_Produto", $id_Produto);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $dados = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location:cadastroProduto.php");
        exit;
    }
    ?>
    <form action="editarBanco.php" method="post" onsubmit="produtoEditado()">
        <input type="hidden" name="id_Produto" id="id_Produto" value="<?= $dados['id_Produto']; ?>">
        <label for="produto">
            Nome do Produto <input type="text" name="produto" value="<?= $dados['produto']; ?>">
        </label><br><br>
        <label for="quantidade">
            Quantidade <input type="number" name="quantidade" value="<?= $dados['quantidade']; ?>">
        </label><br><br>
        <label for="preco">
            Preço <input type="number" name="preco" step="0.01" value="<?= $dados['preco']; ?>">
        </label><br><br>
        <button type="submit">SALVAR</button>
    </form>
</body>

</html>