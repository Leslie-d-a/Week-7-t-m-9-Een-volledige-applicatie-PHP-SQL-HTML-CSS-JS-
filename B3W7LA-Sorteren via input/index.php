<?php
    include 'connect.php';
    include 'functions.php';

    if(!empty($_GET['type'])){
        $characters = getSortedCharacters($_GET['type'], $_GET['order']);
    }else{
        $characters = getAllCharacters();
    }
    $count = count($characters);
    if($_SERVER['REQUEST_METHOD']=='POST'){  
        {
            $type = $_POST['type'];
            $order = $_POST['order'];
            header("Location: index.php?type=$type&order=$order");
        } 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<header>
    <h1>Alle <?php echo $count?> characters uit de database</h1>
    <form action="" method="POST">
        <select name="type" id="">
            <option value="name">name</option>
            <option value="health">health</option>
            <option value="attack">attack</option>
            <option value="defense">defense</option>
        </select>
        <select name="order" id="">
            <option value="asc">ascending</option>
            <option value="desc">descending</option>
        </select>
        <input type="submit" value="sort">
    </form>
</header>
<div id="container">
<a href="locations.php">bekijk alle locaties</a>
<hr>
<?php 
    foreach($characters as $row){
?>
    <a class="item" href="character.php?id=<?php echo $row['id']?>">
        <div class="left">
            <img class="avatar" src="images/<?php echo $row['avatar']?>">
        </div>
        <div class="right">
            <h2><?php echo $row['name']?></h2>
            <div class="stats">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $row['health']?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $row['attack']?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $row['defense']?></li>
                </ul>
            </div>
        </div>
        <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
    </a>
    <?php }?>
</div>
<footer>&copy; Leslie 2020</footer>
</body>
</html>