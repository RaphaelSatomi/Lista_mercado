<?php 
    require "config.php";

    if(isset($_POST['nome']) && !empty($_POST['nome'])
    && isset($_POST['quantidade']) && !empty($_POST['quantidade'])
    && isset($_POST['preco']) && !empty($_POST['preco'])){
        $nome = addslashes($_POST['nome']);
        $quantidade = addslashes($_POST['quantidade']);
        $preco = addslashes($_POST['preco']);
        
        $sql = "INSERT INTO produtos SET nome = :nome, quantidade = :quantidade, preco = :preco";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':preco', $preco);
        $sql->execute();

        header("Location: ../../index.php");

    }else{
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale= 1.0"/>        
        <link href="../pasta/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="../css/adicionar.css"/>
        <script src="../pasta/jquery-3.4.1.min.js"></script>
        <script src="../pasta/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>        
    </head>
    <body>
        <div class="container">
            <h1>Novo produto</h1>
            <form method="POST">
                Nome do Produto: <br/>
                <input maxlength="20" required type="text" name="nome"/><br/><br/>
                Quantidade: <br/>
                <input required type="number" min="0" name="quantidade"/><br/><br/>
                Preço: <br/>
                <input required type="number" step="0.01" min="0" name="preco"/><br/><br/>
                <div class="botoes">
                    <input class="btn btn-primary" type="submit" value="Cadastrar"/>
                    <a class="btn btn-danger" href="../../index.php">Voltar</a>
                </div>
            </form>
        </div>
    </body>    
</html>