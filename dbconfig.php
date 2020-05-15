<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=lista_ordenada", 'root', '');
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}