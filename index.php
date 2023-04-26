<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Aula;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
   $aula = new Aula();
   echo $aula->extrairInformacoes();
   return $response;
});
$app->setBasePath('/ams/ams');
$app->run();