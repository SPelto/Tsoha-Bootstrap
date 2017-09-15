<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('home.html');
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        View::make('helloworld.html');
    }

    public static function login() {
        View::make('login.html');
    }

    public static function luoTapahtuma() {
        View::make('luoTapahtuma.html');
    }

    public static function tapahtuma_lista() {
        View::make('tapahtuma_lista.html');
    }
    public static function tapahtuma_info() {
        View::make('tapahtuma_selaa.html');
    }

    public static function ryhma_info() {
        View::make('ryhma_info.html');
    }

    public static function ryhma_lista() {
        View::make('ryhma_lista.html');
    }
}
