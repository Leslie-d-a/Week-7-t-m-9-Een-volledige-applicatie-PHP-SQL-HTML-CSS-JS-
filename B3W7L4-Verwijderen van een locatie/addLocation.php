<?php
    include 'connect.php';
    include 'functions.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){  
        {
            $location = $_POST['location'];
            addLocation($location);
            header("Location: locations.php?added=$location");
        } 
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
        <a href="locations.php">terug</a>
        <hr>
        <form action='' method='POST'>
            <label><b>Naam:</b></label>
                <input type="text" name="location" autocomplete="off">
            <input type="submit" value="toevoegen">
        </form>
    </div>
    <footer>&copy; Leslie 2020</footer>
</body>
</html>