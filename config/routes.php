<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/login', function() {
// Kirjautumislomakkeen esittäminen
    kayttaja_controller::login();
});
$routes->post('/login', function() {
// Kirjautumisen käsittely
    kayttaja_controller::handle_login();
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

$routes->get('/tapahtuma/info/:id', function($id) {
    tapahtuma_controller::tapahtuma_info($id);
});
$routes->get('/tapahtuma/lista', function() {
    tapahtuma_controller::tapahtuma_lista();
});
$routes->post('/tapahtuma/:id/edit', function($id){
  // Pelin muokkaaminen
  tapahtuma_controller::update($id);
});
$routes->post('/tapahtuma/:id/destroy', function($id) {
    tapahtuma_controller::tapahtuma_destroy($id);
});
$routes->get('/tapahtuma/edit/:id', function($id) {
    tapahtuma_controller::tapahtuma_edit($id);
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

