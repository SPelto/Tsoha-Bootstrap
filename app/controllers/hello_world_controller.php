<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('home.html');
    }

    public static function aika() {
        $timestamp = time();
        echo date('Y-m-d G:i:s', $timestamp);
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $testi = new Kayttaja(array(
            'nimi' => '',
            'puhelinnumero' => '0501234567'
        ));
        $errors = $testi->errors();

        Kint::dump($errors);
    }



}
