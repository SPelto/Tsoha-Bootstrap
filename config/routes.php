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

$routes->get('/selaa', function() {
    HelloWorldController::tapahtuma_selaa();
});
$routes->get('/ryhma_info', function() {
    HelloWorldController::ryhma_info();
});
$routes->get('/ryhma_lista', function() {
    HelloWorldController::ryhma_lista();
});