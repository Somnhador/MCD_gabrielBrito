<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
    <script>
    function produtoDel() {
            alert('PRODUTO DELETADO COM SUCESSO!');
        }
        </script>
</head>
<body>
    <h1>Deletar Produto</h1>
    <?php 
        require 'conexao.php';
        $id_Produto = $_REQUEST["id_Produto"];
        $dados = [];
       $sql = $pdo->prepare("SELECT * FROM prod WHERE id_Produto = :id_Produto");
       $sql->bindValue(":id_Produto", $id_Produto);
       $sql->execute();

       if($sql->rowCount() > 0){
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
       }else{
            header("Location:cadastroProduto.php");
            exit;
       }
       

    ?>
    <h2>Deseja excluir o produto abaixo?</h2>
    
    <form action="excluirBanco.php" method="post" onsubmit="produtoDel()">
        <input  type="hidden" name="id_Produto" id="id_Produto" value="<?=$dados['id_Produto']; ?>">
        <label for="produto">
            Nome do Produto <input type="text" name="produto" value="<?=$dados['produto']; ?>">
        </label>

        <button type="submit">EXCLUIR</button>


    </form><br><br><br>

    <a href="cadastroProduto.php">CANCELAR</a>

</body>
</html>