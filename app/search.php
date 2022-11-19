<?php

if(isset($_POST["submit"])){
    require '../db_conn.php';
    $str =  $_POST["busca"];
    $sth = $conn->prepare("SELECT * FROM tarefas WHERE descricao = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth->execute();

    if($row = $sth->fetch()){
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>Tarefa</th>
            </tr>
            <tr>
                <td><?php echo $row->descricao; ?></td>
            </tr>
   
        </table>
<?php
}  

        else{
            header("Location: ../index.php?mess=error");
        }
    }

?>
