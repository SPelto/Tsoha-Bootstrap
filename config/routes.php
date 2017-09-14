    <?php

    $routes->get('/', function() {
    HelloWorldController::index();
    });

    $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
    });

    $routes->get('/login', function() {
    HelloWorldController::login();
    });

    $routes->get('/luoTapahtuma', function() {
    HelloWorldController::luoTapahtuma();
    });

    $routes->get('/tapahtuma_selaa', function() {
    HelloWorldController::tapahtuma_selaa();
    });
