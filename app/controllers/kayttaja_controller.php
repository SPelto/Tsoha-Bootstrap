<?php

class kayttaja_controller extends BaseController {

    public static function login() {
        View::make('login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = Kayttaja::authenticate($params['username'], $params['password']);

        if (!$user) {
            View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            $_SESSION['user'] = $user->id;

            Redirect::to('/ryhma/lista', array('message' => 'Tervetuloa takaisin ' . $user->nimi . '!'));
        }
    }

    static function login_new() {
        View::make('kayttaja_new.html');
    }



}
