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
        $kayttaja = Kayttaja::all();
        Kint::dump($kayttaja);

        $ryhma = Ryhma::all();
        Kint::dump($ryhma);

        $tapahtuma = Tapahtuma::all();
        Kint::dump($tapahtuma);
    }

    public static function login() {
        View::make('login.html');
    }

    public static function login_new() {
        View::make('kayttaja_new.html');
    }

    public static function tallenna_kayttaja() {
        $params = $_POST;
        $kayttaja = new Kayttaja(array(
            'nimi' => $params['nimi'],
            'puhelinnumero' => $params['puhelinnumero'],
        ));
        $kayttaja->save();

        Redirect::to('/ryhma/lista', array('message' => 'Kayttaja lisätty järjestelmään'));
    }


}
