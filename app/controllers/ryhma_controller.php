<?php

class ryhma_controller extends BaseController {

    public static function tallenna_ryhma() {
        self::check_logged_in();
        $perustettu = date('d-m-Y G:i:s', time());
        $params = $_POST;
        $ryhma = new Ryhma(array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'perustettu' => $perustettu
        ));
        $ryhma_id = $ryhma->save();
        $kayttaja_id = $_SESSION['kayttaja'];
        $perustaja = new Ryhmaperustaja(array('kayttaja_id' => $kayttaja_id, 'ryhma_id' => $ryhma_id));
        $perustaja->save();
        Redirect::to('/ryhma/lista', array('message' => 'Ryhmä perustettu'));
    }

    public static function ryhma_info($id) {
        self::check_logged_in();
        $ryhma = Ryhma::find($id);
        $tapahtumat = Tapahtuma::ryhmanTapahtumat($id);
        Kint::dump($tapahtumat);
        View::make('ryhma_info.html', array('ryhma' => $ryhma, 'tapahtumat' => $tapahtumat));
    }

    public static function ryhma_lista() {
        self::check_logged_in();
        $ryhmat = Ryhma::all();
        View::make('ryhma_lista.html', array('ryhmat' => $ryhmat));
    }

    public static function ryhma_new() {
        self::check_logged_in();
        View::make('ryhma_new.html');
    }

    public static function ryhma_edit($id) {
        self::check_logged_in();
        $ryhma = Ryhma::find($id);
        View::make('ryhma_edit.html', array('ryhma' => $ryhma));
    }

    public static function ryhma_update($id) {
        self::check_logged_in();
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
        self::check_logged_in();
        $ryhma = new Ryhma(array('id' => $id));
        $ryhma->destroy();
        Redirect::to('/ryhma/lista', array('message' => 'Peli on poistettu onnistuneesti!'));
    }

}
