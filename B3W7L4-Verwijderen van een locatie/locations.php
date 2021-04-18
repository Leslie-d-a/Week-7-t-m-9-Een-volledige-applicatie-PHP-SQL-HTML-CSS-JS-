<?php
    include 'connect.php';
    include 'functions.php';

    $locations = getLocations();
    $count = count($locations);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $locationNames = deleteLocations($_POST['delete']);
        header("Location: locations.php?deleted=$locationNames");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All locaties</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    <header><h1>Alle <?php echo $count?> locaties uit de database</h1>
    </header>
    <div id="container">
        <a href="index.php">terug</a>
        <hr>
        <h4>NAME</h4>
        <?php if(!empty($_GET['added'])){?>
            <h5 style='color: limegreen;'>'<?php echo $_GET['added'];?>' is succesvol toegevoegd.</h5>
        <?}if(!empty($_GET['deleted'])){?>
            <h5 style='color: red;'>'<?php echo $_GET['deleted'];?>' succesvol verwijdert.</h5>
        <?php }?>
        <form method="post" id='locationList' onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?')">
                <?php 
                    $index = 0;
                    foreach($locations as $location){
                ?>
                    <div>
                        <input type="checkbox" name="delete[]" value='<?php echo $location['name']?>'>
                        <label><?php echo $location['name']?></label>
                    </div>
                <?php 
                $index++;
                    }
                ?>
                <input type="submit" value="delete">
        </form>
        <hr>
        <a href="addLocation.php">Locatie toevoegen</a>
    </div>
    <footer>&copy; Leslie 2020</footer>
</body>
</html>