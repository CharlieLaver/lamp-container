<?php

require "vendor/autoload.php";
require "config/database.php";

##### TESTING CAPSULE DB #####

// use Models\Test;

// Test::create([
//     "test" => "hello world"
// ]);

// $x = Test::all();

// print_r($x);

##### TESTING ROUTER PLUGIN ####

$router = new Router;
// How GET requests will be defined
$router->get('/some/route', function($request) {
    // The $request argument of the callback 
    // will contain information about the request
    return "Content";
});
// How POST requests will be defined
$router->post('/some/route', function($request) {
    // How to get data from request body
    $body = $request->getBody();
});