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

    public static function tapahtuma_new() {
        self::check_logged_in();
        View::make('tapahtuma_new.html');
    }

    public static function tapahtuma_lista() {
        self::check_logged_in();
        $tapahtumat = Tapahtuma::all();
        Kint::dump($tapahtumat);
        View::make('tapahtuma_lista.html', array('tapahtumat' => $tapahtumat));
    }

    public static function tapahtuma_info($id) {
        self::check_logged_in();
        $tapahtuma = Tapahtuma::find($id);
        Kint::dump($tapahtuma);
        View::make('tapahtuma_info.html', array('tapahtuma' => $tapahtuma));
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

        Redirect::to('/tapahtuma/lista', array('message' => 'Peli on poistettu onnistuneesti!'));
    }

}
