<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List of Recipes</title>
    </head>
    <body>
        <a href="/add">Add</a>
        <h1>List of Recipes</h1>
        <ul>
            <?php foreach ($recipes as $recipe): ?>
            <li>
                <a href="/show?id=<?= $recipe['id'] ?>">
                    <?= $recipe['title'] ?>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </body>
</html>
