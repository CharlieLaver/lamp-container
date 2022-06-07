<?php

/*

    index.php is only used for setting up the config of app.
    All routes should be defined in the routes.php file.

    On inital setup of walrus just enter your database connection details into the
    capsule->addConnection method (called on line 30).

    Walrus uses the follwoing packages for config:
        - https://github.com/illuminate/database
        - https://github.com/nikic/FastRoute

    Thank you :)

*/


require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

error_reporting(E_ALL); 
ini_set('display_errors', '1');

$capsule = new Capsule;

## ENTER DATABASE DETAILS HERE ##
$capsule->addConnection([
    "driver" => "mysql",
    "host" =>"mysql-server",
    "database" => "app1",
    "username" => "root",
    "password" => "secret"
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    
    require "routes.php";

});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        die('NOT_FOUND');
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        die('Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
      
        print $handler($vars);
        break;
}