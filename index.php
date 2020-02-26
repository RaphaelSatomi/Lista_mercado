<?php
    require "assets/php/config.php";

    if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
        $ordem = addslashes($_GET['ordem']);
        $sql = "SELECT * FROM produtos ORDER BY ".$ordem;            
    }else{
        $ordem = "";
        $sql = "SELECT * FROM produtos";        
    }    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale= 1.0"/>        
        <link href="assets/pasta/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="assets/css/index.css"/>
        <script src="assets/pasta/jquery-3.4.1.min.js"></script>
        <script src="assets/pasta/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>        
    </head>
    <body>     
        <div class="logo">
            <img src="images/logo1.png"/>
        </div>
        <div class="container">
            <div class="cont_int">
                <div class="first_row">
                    <a class="add btn btn-primary" href="assets/php/adicionar.php">Adicionar produto</a>
                    <div class="filtro">                                                                   
                        <form method="GET">                            
                            <select class="form-control" name="ordem" onchange="this.form.submit()">                        
                                <option></option>
                                <option value="nome" <?php echo ($ordem == "nome")?'selected="selected"':''; ?>>Alfabética</option>
                                <option value="quantidade" <?php echo ($ordem == "quantidade")?'selected="selected"':''; ?>>Quantidade</option>
                                <option value="preco" <?php echo ($ordem == "preco")?'selected="selected"':''; ?>>Preço</option>
                            </select>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered">            
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quant.</th>
                            <th>Preço</th>
                            <th>Opções</th>
                        </tr>
                    </thead>                
                    <tbody class="tbody">
                        <?php                        
                            $sql = $pdo->query($sql);                                                     
                            if($sql->rowCount() > 0){
                                foreach($sql -> fetchAll() as $prod){                                
                                    echo "<tr>";
                                    echo "<td>".$prod['nome']."</td>";
                                    echo "<td>".$prod['quantidade']."</td>";
                                    echo "<td>".$prod['preco']."</td>";
                                    echo '<td class="botoes"><a class="btn btn-info" href="assets/php/editar.php?id='.$prod['id'].'">Editar</a> 
                                    <a class="btn btn-danger" href="assets/php/excluir.php?id='.$prod['id'].'">Excluir</a></td>';                                
                                    echo "</tr>";                                
                                }
                            }else{
                                echo "Não possui produto<br/>";
                                echo '<a href="assets/php/adicionar.php">Adicionar produto</a>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>