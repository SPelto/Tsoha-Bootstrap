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
        $kayttaja_id = $_SESSION['kayttaja'];
        $ryhma = Ryhma::find($id);
        $tapahtumat = Tapahtuma::ryhmanTapahtumat($id);
        $kayttajat = Kayttaja::findRyhmanKayttajat($id);
        $perustaja = Ryhmaperustaja::findPerustaja($id);
        $kayttaja = Kayttaja::find($kayttaja_id);
        $onkoJasen = Liitostaulu::onkoJasen($kayttaja_id, $id);

        View::make('ryhma_info.html', array(
            'ryhma' => $ryhma,
            'tapahtumat' => $tapahtumat,
            'kayttajat' => $kayttajat,
            'perustaja' => $perustaja,
            'kayttaja' => $kayttaja,
            'onkoJasen' => $onkoJasen)
        );
    }

    public static function ryhma_lista() {
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

    public static function ryhma_eroa($ryhma_id) {
        self::check_logged_in();
        $liitostaulu = Liitostaulu::find($_SESSION['kayttaja'], $ryhma_id);
        $liitostaulu->destroy();
        Redirect::to('/main', array('message' => 'Erosit ryhmästä'));
    }

    public static function ryhma_update($id) {
        self::check_logged_in();
        $params = $_POST;
        $ryhma = new Ryhma(array(
            'id' => $id,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus']
        ));

        $errors = $ryhma->errors();
        if (count($errors) > 0) {
            View::make('ryhma_edit.html', array('errors' => $errors));
        } else {
            $ryhma->update();
            Redirect::to('/ryhma/info/' . $id);
        }
    }

    public static function ryhma_destroy($id) {
        self::check_logged_in();
        $ryhma = new Ryhma(array('id' => $id));
        $ryhma->destroy();
        Redirect::to('/main', array('message' => 'Ryhmä on poistettu onnistuneesti!'));
    }

    public static function join($ryhma_id) {
        self::check_logged_in();
        $kayttaja_id = $_SESSION['kayttaja'];
        $liitos = new Liitostaulu(array('kayttaja_id' => $kayttaja_id, 'ryhma_id' => $ryhma_id));
        $liitos->save();
        Redirect::to('/main', array('message' => 'Liityit ryhmään!'));
    }

}
