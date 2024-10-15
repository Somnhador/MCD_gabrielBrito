<?php
    require 'conexao.php';

    $lista = [];
    $sql = $pdo->query('SELECT*FROM prod');
    $lista = [];
    if($sql->rowCount()>0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
<li> MENU
<ul type='square'>
<li><a href="cadastroProduto.php">Cadastrar Produtos</a></li>
</ul>
    <h1>Lista de Produtos</h1>
    <table border="1px">
    <tr>
        <th>ID</th>
        <th>PRODUTO</th>
        <th>QUANTIDADE</th>
        <th>PREÇO UNITÁRIO</th>
        <th>EDITAR</th>
        <th>EXCLUIR</th>
    </tr>
<?php foreach($lista as $a): ?>
        <tr>
            <td> <?php echo $a['id_Produto']; ?> </td>
            <td> <?=$a['produto']; ?> </td>
            <td> <?php echo $a['quantidade']; ?> </td>
            <td> <?php echo $a['preco']; ?> </td>
            <td> <a href="editar.php?id_Produto= <?=$a['id_Produto'];?>">[EDITAR]</a></td>
            <td> <a href="excluir.php?id_Produto= <?=$a['id_Produto'];?>">[EXCLUIR]</a></td>
        </tr>
        <?php endforeach; ?>
</table>

</body>
</html>