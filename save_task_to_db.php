<?php

    include_once('db.php');

    $task_name = $_POST['task_name'];

    $insertQuery = "INSERT INTO `todolist`(`task_name`) VALUES ('{$task_name}')";

    mysqli_query($mysqli, $insertQuery);

    $message = "Your task <strong>{$task_name}</strong> added successfully!";
    
    header('Location: insert.php?message=' . urlencode($message));
    
    exit;

?>