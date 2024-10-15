<?php
require 'conexao.php';

$id_Produto = $_POST['id_Produto'] ?? null;

if ($id_Produto) {
    $sql = $pdo->prepare("DELETE from prod WHERE id_Produto = :id_Produto");
    $sql->bindValue(':id_Produto', $id_Produto);

    if ($sql->execute()) {
        header("Location: cadastroProduto.php");
    } else {
        echo "Error: " . $sql->errorInfo()[2];
    }
} else {
    echo "NULO";
}
