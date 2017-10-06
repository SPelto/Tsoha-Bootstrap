<?php

class kayttaja_controller extends BaseController {

    public static function login() {
        View::make('login.html');
    }

    public static function main($id) {
        $kayttaja = Kayttaja::find($id);
        View::make('main.html', array('kayttaja' => $kayttaja));
    }

    public static function tallenna_kayttaja() {
        $params = $_POST;
        $kayttaja = new Kayttaja(array(
            'nimi' => $params['nimi'],
            'puhelinnumero' => $params['puhelinnumero'],
            'username' => $params['username'],
            'password' => $params['password']
        ));
        $kayttaja->save();
        Redirect::to('/', array('message' => 'Käyttäjä lisätty järjestelmään'));
    }

    public static function handle_login() {
        $params = $_POST;

        $kayttaja = Kayttaja::authenticate($params['username'], $params['password']);

        if (!$kayttaja) {
            View::make('login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            $_SESSION['kayttaja'] = $kayttaja->id;
            Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $kayttaja->nimi . '!'));
        }
    }

    public static function logout() {
        $_SESSION['kayttaja'] = null;
        Redirect::to('/', array('message' => 'Olet kirjautunut ulos'));
    }

    static function login_new() {
        View::make('kayttaja_new.html');
    }

}
