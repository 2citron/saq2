<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    $app->post('/bottle', \App\Action\AddBottleAction::class);

	$app->delete('/bottle/{id}', \App\Action\deleteBottleAction::class);

	$app->put('/bottle', \App\Action\UpdateBottleAction::class);

	$app->get('/bottles', \App\Action\ShowBottlesAction::class);

    // Documentation de l'api
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);


};

