<?php

class kayttaja_controller extends BaseController {

    public static function login() {
        View::make('login.html');
    }

    public static function main() {
        self::check_logged_in();
        $kayttaja_id = $_SESSION['kayttaja'];
        $kayttaja = Kayttaja::find($kayttaja_id);
        $ryhmat = Ryhma::findKayttajanRyhmat($kayttaja_id);
        View::make('main.html', array('kayttaja' => $kayttaja, 'ryhmat' => $ryhmat));
    }

    public static function tallenna_kayttaja() {
        $params = $_POST;
        $kayttaja = new Kayttaja(array(
            'nimi' => $params['nimi'],
            'username' => $params['username'],
            'password' => $params['password']
        ));
        $errors = $kayttaja->errors();
        if (count($errors) > 0) {
            View::make('kayttaja_new.html', array('errors' => $errors));
        } else {
            $kayttaja->save();
            Redirect::to('/', array('message' => 'Käyttäjä lisätty järjestelmään'));
        }
    }

    public static function handle_login() {
        $params = $_POST;

        $kayttaja = Kayttaja::authenticate($params['username'], $params['password']);

        if (!$kayttaja) {
            View::make('login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            $_SESSION['kayttaja'] = $kayttaja->id;
            Redirect::to('/main', array('message' => 'Tervetuloa takaisin ' . $kayttaja->nimi . '!'));
        }
    }

    public static function logout() {
        $_SESSION['kayttaja'] = null;
        Redirect::to('/login', array('message' => 'Olet kirjautunut ulos'));
    }

    static function login_new() {
        View::make('kayttaja_new.html');
    }

}
