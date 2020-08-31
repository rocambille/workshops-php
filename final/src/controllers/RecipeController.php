<?php

namespace controllers;

require __DIR__ . '/../models/RecipeModel.php';

use models\RecipeModel;

class RecipeController
{
    private $model;

    public function __construct()
    {
        $this->model = new RecipeModel();
    }

    public function browse(): void
    {
        $recipes = $this->model->getAll();

        require __DIR__ . '/../views/index.php';
    }

    public function show(int $id): void
    {
        $recipe = $this->model->getById($id);

        require __DIR__ . '/../views/show.php';
    }

    public function add(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $recipe = array_map('trim', $_POST);
            $errors = $this->validate($recipe);

            if (empty($errors)) {
                $this->model->save($recipe);
                header('Location: /');
            }
        }

        require __DIR__ . '/../views/form.php';
    }

    private function validate(array $recipe): array
    {
        if (empty($recipe['title'])) {
            $errors[] = 'The title is required';
        }
        if (empty($recipe['description'])) {
            $errors[] = 'The description is required';
        }
        if (!empty($recipe['title']) && strlen($recipe['title']) > 255) {
            $errors[] = 'The title should be less than 255 characters';
        }

        return $errors ?? [];
    }
}
