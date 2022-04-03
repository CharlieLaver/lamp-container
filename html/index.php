<?php

    require "vendor/autoload.php";

    ## Show errors
    error_reporting(E_ALL); 
    ini_set('display_errors', '1');

    use Illuminate\Database\Capsule\Manager as Capsule;
    
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

    #####

    use Models\Test;

    Test::create([
        "test" => "hello world"
    ]);

    $x = Test::all();

    print_r($x);