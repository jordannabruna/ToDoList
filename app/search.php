<style type="text/css">
    body {
        width: 80px;
        height: 35px;
        background: #8052ec;
        font-family: sans-serif;
        font-size: 16px;
        color: #F4F4F4;

    }
</style>
<?php

if (isset($_POST["submit"])) {
    require '../db_conn.php';
    $str =  $_POST["busca"];
    $sth = $conn->prepare("SELECT * FROM tarefas WHERE descricao = '$str'");

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    if ($row = $sth->fetch()) {
?>

        <table>
            <style>
                td {
                    height: 40px;
                    background: #F4F4F4;
                    border-radius: 13px;
                    color: #6743c4;
                    border-bottom: 2px solid #d1d3d4;
                    padding: 0.8em 5.5em;
                }
            </style>
            <tr>
                <th>Tarefa</th>
            </tr>
            <tr>
                <td><?php echo $row->descricao; ?></td>
                <td>
                    <?php
                    if ($row->checked) echo "Concluída";

                    else echo "Não concluída";

                    ?>
                </td>

            </tr>

        </table>
<?php
    } else {
        header("Location: ../index.php?mess=error");
    }
}

?>