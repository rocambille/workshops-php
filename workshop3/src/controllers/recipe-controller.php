<?php

require __DIR__.'/../models/recipe-model.php';

function browseRecipes(): void {
    $recipes = getAllRecipes();

    require __DIR__.'/../views/index.php';
}

function showRecipe(int $id): void {
    $recipe = getRecipeById($id);

    require __DIR__.'/../views/show.php';
}

function addRecipe(): void {
    if (isset($_POST['title'], $_POST['description'])) {
        saveRecipe($_POST['title'], $_POST['description']);

        header('Location: /');
    } else {
        require __DIR__.'/../views/form.php';
    }
}
