<?php
function dbCon(){
    try {
        $pdo = new PDO('mysql:dbname=dynamischecharacters;host=localhost','root','mysql');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }