<?php

if(isset($_POST['descricao'])){
    require '../db_conn.php';

    $descricao = $_POST['descricao'];

    if(empty($descricao)){
        header("Location: ../index.php?mess=error");
    }else{
        $stmt = $conn->prepare("INSERT INTO tarefas(descricao) VALUE(?)");
        $res = $stmt->execute([$descricao]);

        if($res){
            header("Location: ../index.php?mess=sucess");
        }else{
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else{
    header("Location: ../index.php?mess=error");
}
