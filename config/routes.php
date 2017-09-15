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

$routes->get('/tapahtuma_info', function() {
    HelloWorldController::tapahtuma_info();
});
$routes->get('/tapahtuma_lista', function() {
    HelloWorldController::tapahtuma_lista();
});
$routes->get('/ryhma_info', function() {
    HelloWorldController::ryhma_info();
});
$routes->get('/ryhma_lista', function() {
    HelloWorldController::ryhma_lista();
});