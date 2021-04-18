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

function getLocations(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM locations ORDER BY name';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function updateLocation($charId, $location){
    $pdo = dbCon();
    $sql = "UPDATE characters SET location=:location WHERE id=:id";
    $result = $pdo->prepare($sql);
    $result->bindParam(':location', $location);
    $result->bindParam(':id', $charId);
    $result->execute();
    return $result;
}