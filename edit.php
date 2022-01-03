<?php

    include_once('db.php');

    $taskId = $_GET['id']; // getting this from the url

    $selectQuery = "SELECT * FROM todolist WHERE id = {$taskId}";

    $todoResult = mysqli_query($mysqli, $selectQuery);

    // fetching just one single row
    $todoArray = mysqli_fetch_array($todoResult);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Task</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- external stylesheet  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-secondary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">TODO List</span>
    </div>
  </nav>
  <div class="container-fluid insert-todo">
    <form action="update.php" method="post">
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label" ><h3>Enter Task Name</h3></label>
    
      <input type="text" class="form-control p-2" name="task_name" id="formGroupExampleInput" value="<?php echo $todoArray['task_name'];?>" placeholder="type your task name here!!">

        <h4 class="mt-3"><label for="">Change status</label></p></h4>
        <p>
            <select name="status"class="p-2">
                <option value="2" <?php echo $todoArray['status'] == 2 ? 'selected' : '';?>>Pending</option>
                <option value="1" <?php echo $todoArray['status'] == 1 ? 'selected' : '';?>>Complete</option>
            </select>
        </p>
        <p><input type="hidden" name="task_id" value="<?php echo $todoArray['id'];?>"></p>
        <button type="submit" class="btn btn-primary">Update List</button>
    </form>



<a class="btn btn-primary" href="insert.php" role="button">View Task List</a>
</body>
</html>