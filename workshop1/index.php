<?php
$connection = new PDO("mysql:host=localhost;dbname=marmiwild;charset=utf8", 'jdoe', 'Secret1#');

$result = $connection->query('SELECT id, title FROM recipe');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List of Recipes</title>
    </head>
    <body>
        <h1>List of Recipes</h1>
        <ul>
            <?php while ($recipe = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <a href="/show.php?id=<?= $recipe['id'] ?>">
                    <?= $recipe['title'] ?>
                </a>
            </li>
            <?php endwhile ?>
        </ul>
    </body>
</html>

<?php
$connection = null;
?>
