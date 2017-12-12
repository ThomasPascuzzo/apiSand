<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../src/vendor/autoload.php';
$app = new \Slim\App(["settings"=>["displayErrorDetails"=>true]]);

$app->get('/cat/',
    \lbs\control\SandwichController::class . ':getCategories'
    );

$app->get('/categorie/{id}',
    \lbs\control\SandwichController::class . ':getOneCategories'
);
$app->get('/categoriesand/{id}',
\lbs\control\SandwichController::class . ':getSandwichByCategorie'
);

$app->post('/categories[/{}]',
    \lbs\control\SandwichController::class . ':createCategories'
);
$app->put('/categories[/{}]',
    \lbs\control\SandwichController::class . ':updateCategories'
);
$app->put('/categorie{id}',
    \lbs\control\SandwichController::class . ':removeCategorie'
);



$app->run();