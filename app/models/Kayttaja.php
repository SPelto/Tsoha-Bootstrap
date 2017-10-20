<?php

Class Kayttaja extends BaseModel {

    public $id, $nimi, $username, $password;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi', 'validate_username', 'validate_password');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
        $query->execute();
        $rows = $query->fetchAll();
        $Kayttajat[] = array();

        foreach ($rows as $row) {
            $Kayttajat[] = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'username' => $row['username'],
                'password' => $row['password']
            ));
        }
        return $Kayttajat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $Kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
            return $Kayttaja;
        }
        return null;
    }

    public static function findRyhmanKayttajat($id) {
        $query = DB::connection()->prepare(''
                . 'SELECT k.nimi AS nimi '
                . 'FROM Kayttaja k '
                . 'INNER JOIN Liitostaulu l '
                . 'ON k.id = l.kayttaja_id '
                . 'INNER JOIN Ryhma r '
                . 'ON r.id = l.ryhma_id '
                . 'WHERE r.id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $kayttajat[] = array();
        foreach ($rows as $row) {
            $kayttajat[] = new Kayttaja(array(
//                'id' => $row['id'],
                'nimi' => $row['nimi'],
//                'puhelinnumero' => $row['puhelinnumero'],
//                'username' => $row['username'],
//                'password' => $row['password']
            ));
        }
        return $kayttajat;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (nimi, username, password) '
                . 'VALUES (:nimi, :username, :password) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'username' => $this->username, 'password' => $this->password));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public static function authenticate($username, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE username = :username AND password = :password LIMIT 1');
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            $kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
            return $kayttaja;
        } else {
            return null;
        }
    }

}
