<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "genericblogbetadatabase";

    try
    {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        echo 'Server Error: '.$e;
    }
?>