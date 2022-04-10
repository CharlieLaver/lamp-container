<?php

use Illuminate\Database\Capsule\Manager as Capsule;

## Show errors
error_reporting(E_ALL); 
ini_set('display_errors', '1');

## Setup Database Capsule
$capsule = new Capsule;

$capsule->addConnection([
    "driver" => "mysql",
    "host" =>"mysql-server",
    "database" => "app1",
    "username" => "root",
    "password" => "secret"
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();