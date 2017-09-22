<?php

class ryhma_controller extends BaseController {


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

    public static function ryhma_info($id) {
        $ryhmat = Ryhma::find($id);
        Kint::dump($ryhmat);
        View::make('ryhma_info.html', array('ryhmat' => $ryhmat));
    }

    public static function ryhma_lista() {
        $ryhmat = Ryhma::all();
        View::make('ryhma_lista.html', array('ryhmat' => $ryhmat));
    }

    public static function ryhma_new() {
        View::make('ryhma_new.html');
    }

}
