<?php 
function getAllCharacters(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM characters ORDER BY name';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function getSortedCharacters($type, $order){
    $pdo = dbCon();
    $sql = "SELECT * FROM characters ORDER BY $type $order";
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
}

function addLocation($location){
    $pdo = dbCon();
    $sql = "INSERT INTO locations (name) VALUES (:location)";
    $result = $pdo->prepare($sql);
    $result->bindParam(':location', $location);
    $result->execute();
}

function deleteLocations($locations){
    if(!empty($locations)){
        $pdo = dbCon();
        $locations = implode("','", $locations);
        print($locations);
        $sql = "DELETE FROM locations WHERE name IN ('$locations')";
        $result = $pdo->prepare($sql);
        $result->execute();
        $locations = explode("','", $locations);
        $locations = implode(", ", $locations);
        return $locations;
    }
}