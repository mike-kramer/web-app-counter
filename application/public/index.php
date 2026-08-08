<?php
require "../vendor/autoload.php";

session_start();

\App\Lib\Db::getPdo();
\App\Init\DBInitializer::init();

$routes = require __DIR__ . "/../routes/routes.php";

$frontController = new \App\Lib\FrontController($routes);

$frontController->run();