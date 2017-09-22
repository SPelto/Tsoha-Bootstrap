<?php

class tapahtuma_controller extends BaseController {

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

}
