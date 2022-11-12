<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    }else {
        $tarefas = $conn->prepare("SELECT id, checked FROM tarefas WHERE id=?");
        $tarefas->execute([$id]);

        $tarefa = $tarefas->fetch();
        $uId = $tarefa['id'];
        $checked = $tarefa['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE tarefas SET checked=$uChecked WHERE id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}
