<?php

class tapahtuma_controller extends BaseController {

    public static function tallenna_tapahtuma() {
        self::check_logged_in();
        $params = $_POST;
        $tapahtuma = new Tapahtuma(array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'aika' => $params['aika'],
            'ryhma_id' => $params['ryhma_id']
        ));
        $kayttaja_id = $_SESSION['kayttaja'];
        $tapahtuma_id = $tapahtuma->save();

        $perustaja = new Tapahtumaperustaja(array('kayttaja_id' => $kayttaja_id, 'tapahtuma_id' => $tapahtuma_id));
        $perustaja->save();
        Redirect::to('/tapahtuma/lista', array('message' => 'Tapahtuma lisätty järjestelmään'));
    }

    public static function tapahtuma_new($id) {
        self::check_logged_in();
        $ryhma = Ryhma::find($id);
        View::make('tapahtuma_new.html', array('ryhma' => $ryhma));
    }

    public static function tapahtuma_lista() {
        $tapahtumat = Tapahtuma::all();
        View::make('tapahtuma_lista.html', array('tapahtumat' => $tapahtumat));
    }

    public static function tapahtuma_info($id) {
        self::check_logged_in();
        $kayttaja_id = $_SESSION['kayttaja'];
        $tapahtuma = Tapahtuma::find($id);
        $perustaja = Tapahtumaperustaja::findPerustaja($id);
        $kayttaja = Kayttaja::find($kayttaja_id);

        View::make('tapahtuma_info.html', array(
            'tapahtuma' => $tapahtuma,
            'perustaja' => $perustaja,
            'kayttaja' => $kayttaja)
        );
    }

    public static function tapahtuma_edit($id) {
        self::check_logged_in();
        $tapahtuma = Tapahtuma::find($id);
        View::make('tapahtuma_edit.html', array('tapahtuma' => $tapahtuma));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'aika' => $params['aika']
        );


        $tapahtuma = new Tapahtuma($attributes);
//    $errors = $tapahtuma->errors();
//    if(count($errors) > 0){
//      View::make('game/edit.html', array('errors' => $errors, 'attributes' => $attributes));
//    }else{
        // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
        $tapahtuma->update();
        Redirect::to('/tapahtuma/info/' . $id);
//    }
    }

    // Pelin poistaminen
    public static function tapahtuma_destroy($id) {
        self::check_logged_in();
        $tapahtuma = new Tapahtuma(array('id' => $id));
        $tapahtuma->destroy();

        Redirect::to('/main', array('message' => 'Tapahtuma on poistettu'));
    }

}
