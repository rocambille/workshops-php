<?php

namespace controllers;

require __DIR__.'/../models/RecipeModel.php';

use models\RecipeModel;

class RecipeController {
    private $model;

    public function __construct() {
        $this->model = new RecipeModel();
    }

    public function browse(): void {
        $recipes = $this->model->getAll();

        require __DIR__.'/../views/index.php';
    }

    public function show(int $id): void {
        $recipe = $this->model->getById($id);

        require __DIR__.'/../views/show.php';
    }

    public function add(): void {
        if (isset($_POST['title'], $_POST['description'])) {
            $this->model->save($_POST['title'], $_POST['description']);

            header('Location: /');
        } else {
            require __DIR__.'/../views/form.php';
        }
    }
}
