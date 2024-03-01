<?php
    $dsn = 'mysql:host=localhost; dbname=todolist';
    $username = 'theadmin';
    $password = 'pa55word';

    try{
        $db = new PDO($dsn, $username, $password);
    }
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('views\databaseError.php');
        exit();
    }
?>