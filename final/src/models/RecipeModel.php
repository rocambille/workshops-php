<?php

namespace models;

use \PDO;

class RecipeModel {
    private $connection;

    public function __construct() {
        $this->connection = new PDO("mysql:host=localhost;dbname=marmiwild;charset=utf8", 'jdoe', 'Secret1#');
    }

    public function getAll(): array {
        $result = $this->connection->query('SELECT id, title FROM recipe');

        $recipes = $result->fetchAll(PDO::FETCH_ASSOC);

        return $recipes;
    }

    public function getById(int $id): array {
        $query = 'SELECT title, description FROM recipe WHERE id=:id';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $recipe = $statement->fetch(PDO::FETCH_ASSOC);

        return $recipe;
    }

    public function save(string $title, string $description): void {
        $query = 'INSERT INTO recipe(title, description) VALUES (:title, :description)';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        $statement->execute();
    }
}
