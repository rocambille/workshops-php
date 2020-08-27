<?php
require_once 'config.php';
$connection = new PDO("mysql:host=". SERVER . ";dbname=". DATABASE .";charset=utf8", USER, PASSWORD);

$query = 'SELECT title, description FROM recipe WHERE id=:id';
$statement = $connection->prepare($query);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();

$recipe = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $recipe['title'] ?></title>
</head>
<body>
    <a href="/">Home</a>
    <h1><?= $recipe['title'] ?></h1>

    <div>
        <?= $recipe['description'] ?>
    </div>
</body>
</html>
