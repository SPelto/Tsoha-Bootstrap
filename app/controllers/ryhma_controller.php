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
        $ryhma = Ryhma::find($id);
        Kint::dump($ryhma);
        View::make('ryhma_info.html', array('ryhma' => $ryhma));
    }

    public static function ryhma_lista() {
        $ryhmat = Ryhma::all();
        View::make('ryhma_lista.html', array('ryhmat' => $ryhmat));
    }

    public static function ryhma_new() {
        View::make('ryhma_new.html');
    }

    public static function ryhma_edit($id) {
        $ryhma = Ryhma::find($id);
        View::make('ryhma_edit.html', array('ryhma' => $ryhma));
    }

    public static function ryhma_update($id) {
        $params = $_POST;
        $ryhma = new Ryhma(array(
            'id' => $id,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus']
        ));
        $ryhma->update();
        Redirect::to('/ryhma/info/' . $id);
    }

    public static function ryhma_destroy($id) {
        $ryhma = new Ryhma(array('id' => $id));
        $ryhma->destroy();
        Redirect::to('/ryhma/lista', array('message' => 'Peli on poistettu onnistuneesti!'));
    }

}
