<?php
$connection = new PDO("mysql:host=localhost;dbname=marmiwild;charset=utf8", 'jdoe', 'Secret1#');

$query = 'SELECT title, description FROM recipe WHERE id=:id';
$statement = $connection->prepare($query);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();

$recipe = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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

<?php
$connection = null;
?>
