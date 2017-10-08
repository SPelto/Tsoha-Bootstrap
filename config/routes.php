<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->post('/logout', function() {
    kayttaja_controller::logout();
});
$routes->get('/login', function() {
// Kirjautumislomakkeen esittäminen
    kayttaja_controller::login();
});

$routes->post('/login', function() {
// Kirjautumisen käsittely
    kayttaja_controller::handle_login();
});

$routes->get('/main', function() {
    kayttaja_controller::main();
});

$routes->get('/login/new', function() {
    kayttaja_controller::login_new();
});

$routes->post('/kayttaja/post', function() {
    kayttaja_controller::tallenna_kayttaja();
});
$routes->post('/tapahtuma/post', function() {
    tapahtuma_controller::tallenna_tapahtuma();
});

$routes->get('/tapahtuma/new', function() {
    tapahtuma_controller::tapahtuma_new();
});

$routes->get('/tapahtuma/info/:id', function($id) {
    tapahtuma_controller::tapahtuma_info($id);
});
$routes->get('/tapahtuma/lista', function() {
    tapahtuma_controller::tapahtuma_lista();
});
$routes->post('/tapahtuma/:id/edit', function($id) {
    // Pelin muokkaaminen
    tapahtuma_controller::update($id);
});
$routes->post('/tapahtuma/:id/destroy', function($id) {
    tapahtuma_controller::tapahtuma_destroy($id);
});
$routes->get('/tapahtuma/edit/:id', function($id) {
    tapahtuma_controller::tapahtuma_edit($id);
});

$routes->get('/ryhma/join/:id', function($id) {
    ryhma_controller::join($id);
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
$routes->get('/ryhma/edit/:id', function($id) {
    ryhma_controller::ryhma_edit($id);
});
$routes->post('/ryhma/:id/edit', function($id) {
    ryhma_controller::ryhma_update($id);
});
$routes->post('/ryhma/:id/destroy', function($id) {
    ryhma_controller::ryhma_destroy($id);
});
$routes->get('/aika', function() {
    HelloWorldController::aika();
});

