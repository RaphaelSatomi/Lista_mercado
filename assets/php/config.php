<?php

try{
    $pdo = new PDO("mysql:dbname=prod_mercado", "root", "");
}catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}

?>