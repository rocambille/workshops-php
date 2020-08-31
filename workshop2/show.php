<?php

require_once 'config.php';
require __DIR__.'/src/models/recipe-model.php';

$recipe = getRecipeById($_GET['id']);

require __DIR__.'/src/views/show.php';
