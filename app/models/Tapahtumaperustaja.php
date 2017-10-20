<?php

class Tapahtumaperustaja extends BaseModel {

    public $kayttaja_id, $tapahtuma_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Tapahtumaperustaja (kayttaja_id, tapahtuma_id) VALUES (:kayttaja_id, :tapahtuma_id)');
        $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'tapahtuma_id' => $this->tapahtuma_id));
    }

    public static function findPerustaja($tapahtuma_id) {
        $query = DB::connection()->prepare(''
                . 'SELECT * '
                . 'FROM Tapahtumaperustaja tp '
                . 'JOIN Kayttaja k '
                . 'ON tp.kayttaja_id = k.id '
                . 'WHERE tp.tapahtuma_id = :tapahtuma_id');
        $query->execute(array('tapahtuma_id' => $tapahtuma_id));
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
