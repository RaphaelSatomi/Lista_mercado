<?php 
    require "config.php";

    $id = 0;
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
    }

    if(isset($_POST['nome']) && !empty($_POST['nome'])
    && isset($_POST['quantidade']) && !empty($_POST['quantidade'])
    && isset($_POST['preco']) && !empty($_POST['preco'])){
        $nome = addslashes($_POST['nome']);
        $quantidade = addslashes($_POST['quantidade']);
        $preco = addslashes($_POST['preco']);
        
        $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade, preco = :preco WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':preco', $preco);
        $sql->bindValue(':id', $id);
        $sql->execute();

        header("Location: ../../index.php");        
    }else{
        
    }
    $sql = "SELECT * FROM produtos WHERE id = '$id'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
    }else{
        header("Location: index.php");
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale= 1.0"/>        
        <link href="../pasta/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/editar.css"/>
        <script src="../pasta/jquery-3.4.1.min.js"></script>
        <script src="../pasta/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>        
    </head>
    <body>
        <div class="container">
            <h1>Editar Produto</h1>
            <form method="POST">
                Nome do Produto: <br/>
                <input required maxlength="20" type="text" name="nome" value="<?php echo $dado['nome']?>"/><br/><br/>
                Quantidade: <br/>
                <input required type="number" min="0" name="quantidade"  value="<?php echo $dado['quantidade']?>"/><br/><br/>
                Preço: <br/>
                <input required type="number" step="0.01" min="0" name="preco"  value="<?php echo $dado['preco']?>"/><br/><br/>
                <div class="botoes">
                    <input class="btn btn-primary" type="submit" value="Atualizar"/>
                    <a class="btn btn-danger" href="../../index.php">Voltar</a>
                </div>
            </form>
        </div>
    </body>    
</html>




