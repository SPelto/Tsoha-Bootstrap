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
    tapahtuma_controller::tallenna_tapahtuma();
});

$routes->get('/tapahtuma/new', function() {
    tapahtuma_controller::tapahtuma_new();
});

$routes->get('/tapahtuma/info', function() {
    tapahtuma_controller::tapahtuma_info();
});
$routes->get('/tapahtuma/lista', function() {
    tapahtuma_controller::tapahtuma_lista();
});
$routes->get('/ryhma/info/:id', function($id) {
    ryhma_controller::ryhma_info($id);
});
$routes->get('/ryhma/lista', function() {
    ryhma_controller::ryhma_lista();
});

$routes->post('/ryhma/post', function() {
    ryhma_controller::tallenna_ryhma();
});

$routes->get('/ryhma/new', function() {
    ryhma_controller::ryhma_new();
});

$routes->get('/aika', function() {
    HelloWorldController::aika();
});

