<?php 
    require "config.php";

    $id = 0;
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
        $sql = "DELETE FROM produtos WHERE id = '$id'";        
        $pdo->query($sql);
        header("Location: ../../index.php");
    }else{
        header("Location: ../../index.php");
    }
                
?>