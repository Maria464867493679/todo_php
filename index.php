<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>TODO LIST</title>
</head>
<body>

<div class="wrapper">
<div class="container">    

    <div class="enter_block">
    <form method="post">
      <label for="task-name"><b>Название задачи</b></label><br><br>
      <input type="text" id="task-name" class="task_name" name="task-name" placeholder="name task"><br><br>

      <div id="subtasks">
        <div class="subtask">
          <label for="subtask-name-1"><b>Список подзадач</b></label><br><br>
          <input type="text" id="subtask-name-1" name="subtask-name[]" placeholder="name subtask">
          <input type="number" id="subtask-hours-1" name="subtask-hours[]" placeholder="hours">
          <button type="button" class="remove-subtask">Remove</button><br><br>
        </div>
      </div>

      <button type="button" id="add-subtask">Добавить подзадачу</button><br><br>

      <button type="submit" name="save-task" class="save-task">Сохранить задание</button>
    </form>
    </div>


    <div>
        <? 
        if (isset($_POST["save-task"])) {
          $taskName = $_POST["task-name"];
          $subtaskNames = $_POST["subtask-name"];
          $subtaskHours = $_POST["subtask-hours"];

          $file = fopen("tasks.txt", "a");
          fwrite($file, "+----+-------+----------------------------------------------------------------------+\n");
          fwrite($file, "| " . str_pad($taskName, 30) . " |\n");
          fwrite($file, "+----+-------+----------------------------------------------------------------------+\n");
          for ($i = 0; $i < count($subtaskNames); $i++) {
            fwrite($file, "| " . str_pad(($i + 1), 2) . " | " . str_pad($subtaskHours[$i], 5) . " | " . str_pad($subtaskNames[$i], 72) . " |\n");
          }
          fwrite($file, "+----+-------+----------------------------------------------------------------------+\n");
          fclose($file);
        }



        $file = fopen("tasks.txt", "r");
        if ($file) {
          while (($line = fgets($file)) !== false) {
            echo $line . "<br>";
          }
          fclose($file);
        }
        ?>
    </div>

</div>    
</div>
<script src="script.js"></script> 
</body>
</html>








