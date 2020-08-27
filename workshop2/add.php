<?php

require __DIR__.'/src/models/recipe-model.php';

if (isset($_POST['title'], $_POST['description'])) {
    saveRecipe($_POST['title'], $_POST['description']);

    header('Location: /');
} else {
    require __DIR__.'/src/views/form.php';
}
