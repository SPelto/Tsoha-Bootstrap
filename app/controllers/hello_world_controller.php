<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu';
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

    public static function tapahtuma_selaa() {
        View::make('tapahtuma_selaa.html');
    }

    public static function kokeilu() {
        echo 'Pääsit tänne!';
    }

}
