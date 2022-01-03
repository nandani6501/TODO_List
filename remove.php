<?php

    include_once('db.php');

    $taskId = $_GET['id']; // getting this from the url

    $selectQuery = "DELETE FROM todolist WHERE id = {$taskId}";

    $todoResult = mysqli_query($mysqli, $selectQuery);

    $message = 'Item removed from your todo!';

    header('Location: insert.php?message=' . urlencode($message));
    
    exit;

?>