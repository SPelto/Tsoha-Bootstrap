<?php

Class Kayttaja extends BaseModel {

    public $id, $nimi, $puhelinnumero;

    public function __construct($attributes) {
        parent::__construct($attributes);
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
                'puhelinnumero' => $row['puhelinnumero']
            ));
        }
        return $Kayttajat;
    }

    public static function find($puhelinnumero) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE puhelinnumero = :puhelinnumero');
        $query->execute(array('puhelinnumero' => $puhelinnumero));
        $row = $query->fetch();

        if ($row) {
            $Kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'puhelinnumero' => $row['puhelinnumero']
            ));
            return $Kayttaja;
        }
        return null;
    }
        public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (nimi, puhelinnumero) '
                . 'VALUES (:nimi, :puhelinnumero) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'puhelinnumero' => $this->puhelinnumero));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

}
