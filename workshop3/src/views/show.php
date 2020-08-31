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
