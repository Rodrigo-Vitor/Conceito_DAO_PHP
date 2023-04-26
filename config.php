<?php 
    try {
        $pdo = new PDO("mysql:dbname=test;host:localhost", "root");
    } catch (Exception $e) {
        echo $e;
    }
?>