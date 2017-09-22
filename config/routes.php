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

$routes->get('/login/new', function() {
HelloWorldController::login_new();
});

$routes->post('/kayttaja/post', function() {
HelloWorldController::tallenna_kayttaja();
});


$routes->post('/tapahtuma/post', function() {
HelloWorldController::tallenna_tapahtuma();
});

$routes->get('/tapahtuma/new', function() {
HelloWorldController::tapahtuma_new();
});

$routes->get('/tapahtuma/info', function() {
HelloWorldController::tapahtuma_info();
});
$routes->get('/tapahtuma/lista', function() {
HelloWorldController::tapahtuma_lista();
});
$routes->get('/ryhma/info', function() {
HelloWorldController::ryhma_info();
});
$routes->get('/ryhma/lista', function() {
HelloWorldController::ryhma_lista();
});

$routes->post('/ryhma/post', function() {
HelloWorldController::tallenna_ryhma();
});

$routes->get('/ryhma/new', function() {
HelloWorldController::ryhma_new();
});

$routes->get('/aika', function() {
HelloWorldController::aika();
});

