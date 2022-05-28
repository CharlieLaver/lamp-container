<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    
    $r->get('/', function() {
        echo 'Hello World';
    });

});