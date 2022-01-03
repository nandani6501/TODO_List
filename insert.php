<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>

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
    <form action="save_task_to_db.php" method="post">
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label" ><h3>Enter Task Name</h3></label>
      <input type="text" class="form-control p-2" name="task_name" id="formGroupExampleInput" placeholder="type your task name here!!">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Add to TODO List</button>
    </div>
  </form>
    
</div>

<?php

include_once('db.php');

$selectQuery = "SELECT * FROM `todolist` ";

$todoResult = mysqli_query($mysqli, $selectQuery);

?>

    
  
<h3 style="text-align: center; margin-bottom: 2rem; padding-top: 2rem;">Your Tasks List !</h3>
  <div style="overflow-x:auto">
  <table class="table table-bordered table-hover" >
    
    <thead class="table-secondary">
             
    <tr>
    
        <td>Task_No</td>
        <td>Task Name</td>
        <td>Status</td>
        <td>Edit</td>
        <td>Remove</td>
    </tr>
  </thead>
    <?php
    $id = 1;
        while($todoArray = mysqli_fetch_array($todoResult))
        {
            
            echo '<tr>';

            echo '<td>'.$id++.'</td>';
            echo '<td>' . $todoArray['task_name'] . '</td>';
            if($todoArray['status'] == 2)
            {
                echo '<td class="pending" style="color:red;">Pending</td>';
            }
            else
            {
                echo '<td class="done" style="color:green;">Completed</td>';
            }
            echo '<td><a class="btn btn-primary" role="button" href="edit.php?id=' . $todoArray['id'] . '">Edit</a></td>';
            echo '<td><a class = "btn btn-danger" role="button" href="remove.php?id=' . $todoArray['id'] . '">Remove</a></td>';
            echo '</tr>';
        }
    
    ?>
</table>
</div>



<!-- js bootstrap  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
