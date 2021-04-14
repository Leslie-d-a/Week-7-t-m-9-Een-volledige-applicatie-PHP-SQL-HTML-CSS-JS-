<?php 
function getAllCharacters(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM characters ORDER BY name';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function getCharacter($id){
    $pdo = dbCon();
    $sql = "SELECT * FROM characters WHERE id=:id";
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetch();
    return $result;
}