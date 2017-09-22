<?php

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        View::make('home.html');
    }

    public static function aika() {
        $timestamp = time();
        echo date('Y-m-d TH:i:s', $timestamp);
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

    public static function tallenna_tapahtuma() {
        $params = $_POST;
        $ryhma = new Tapahtuma(array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'aika' => $params['aika']
        ));
        $ryhma->save();

        Redirect::to('/tapahtuma/lista', array('message' => 'Tapahtuma lisätty järjestelmään'));
    }

    public static function tapahtuma_new() {
        View::make('tapahtuma_new.html');
    }

    public static function tapahtuma_lista() {
        $tapahtumat = Tapahtuma::all();
        View::make('tapahtuma_lista.html', array('tapahtumat' => $tapahtumat));
    }

    public static function tapahtuma_info() {
        View::make('tapahtuma_selaa.html');
    }

    public static function tallenna_ryhma() {
        $perustettu = date('d-m-Y G:i:s', time());
        $params = $_POST;
        $ryhma = new Ryhma(array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'perustettu' => $perustettu
        ));
        $ryhma->save();

        Redirect::to('/ryhma/lista', array('message' => 'Ryhmä lisätty järjestelmään'));
    }

    public static function ryhma_info() {
        View::make('ryhma_info.html');
    }

    public static function ryhma_lista() {
        $ryhmat = Ryhma::all();
        View::make('ryhma_lista.html', array('ryhmat' => $ryhmat));
    }

    public static function ryhma_new() {
        View::make('ryhma_new.html');
    }

}
