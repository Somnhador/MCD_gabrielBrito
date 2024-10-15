<?php
require 'conexao.php';

$id_Produto = $_POST['id_Produto'] ?? null;
$produto = $_POST['produto'] ?? null;
$quantidade = $_POST['quantidade'] ?? null;
$preco = $_POST['preco'] ?? null;

if ($produto && $quantidade && $preco) {
    $sql = $pdo->prepare("UPDATE prod SET produto = :produto , quantidade = :quantidade, preco = :preco WHERE id_Produto = $id_Produto");
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':preco', $preco);

    if ($sql->execute()) {
        header("Location: cadastroProduto.php");
    } else {
        echo "Error: " . $sql->errorInfo()[2];
    }
} else {
    echo "NULO";
}
?>
