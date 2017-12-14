<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../src/vendor/autoload.php';
$config=parse_ini_file("../src/conf/lbs.db.conf.ini");
$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();
//Création et configuration du container
$configuration=[
  'settings'=>[
    'displayErrorDetails'=>true
  ]
];
$errors = require_once __DIR__ . '/../src/conf/api_errors.php';
$c=new \Slim\Container(array_merge( $configuration, $errors) );
$app=new \Slim\App($c);
$c = $app->getContainer();

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