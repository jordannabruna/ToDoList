<?php
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>To-Do List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>

  <div class="container">
    <div class="adiciona">
      <form action="app/add.php" method="POST" autocomplete="off">
        <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){?>
            <input type="text"
                   name="descricao"
                   style="border-color: #ff6666"
                   placeholder="Este campo é obrigatório"  />
            <button type="submit">ADD</button>
        <?php }else{ ?>
            <input type="text"
                   name="descricao" 
                   placeholder="Tarefa a fazer.">
              <button type="submit">ADD</button>
        <?php } ?>
      </form>
    </div>
    <?php
      $tarefas = $conn->query("SELECT * FROM tarefas ORDER BY id DESC");
    ?>
    <div class="mostrar-tarefas">
      <?php if ($tarefas->rowCount() <= 0) { ?>
        <div class="item-tarefa">
          <div class="empty">
            Não há Tarefas.
          </div>
        </div>
      <?php } ?>

      <?php while ($tarefa = $tarefas->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="item-tarefa">
          <span id="<?php echo $tarefa['id']; ?>" class="remover-tarefa"><i class="far fa-trash-alt"></i></span>
          <?php if ($tarefa['checked']) { ?>
            <input type="checkbox"
                   class="check-box"
                   checked />
            <h2 class="checked"><?php echo $tarefa['descricao']; ?></h2>
          <?php } else { ?>
            <input type="checkbox" class="check-box" />
            <h2><?php echo $tarefa['descricao']; ?></h2>
          <?php } ?>
          <br>
          <small>Data de Criação: <?php echo $tarefa['date_time'] ?></small>
        </div>
      <?php } ?>
    </div>

  </div>

</body>

</html>