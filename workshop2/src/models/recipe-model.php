<?php

function createConnection(): PDO {
    return new PDO("mysql:host=localhost;dbname=marmiwild;charset=utf8", 'jdoe', 'Secret1#');
}

function getAllRecipes(): array {
    $connection = createConnection();

    $result = $connection->query('SELECT id, title FROM recipe');

    $recipes = $result->fetchAll(PDO::FETCH_ASSOC);

    $connection = null;

    return $recipes;
}

function getRecipeById(int $id): array {
    $connection = createConnection();

    $query = 'SELECT title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $recipe = $statement->fetch(PDO::FETCH_ASSOC);

    $connection = null;

    return $recipe;
}

function saveRecipe(string $title, string $description): void {
    $connection = createConnection();

    $query = 'INSERT INTO recipe(title, description) VALUES (:title, :description)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':description', $description, PDO::PARAM_STR);
    $statement->execute();

    $connection = null;
}
