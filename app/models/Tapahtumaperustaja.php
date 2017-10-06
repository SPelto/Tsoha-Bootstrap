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

    public static function find($kayttaja_id, $ryhma_id) {
        $query = DB::connection()->prepare('SELECT * FROM Tapahtumaperustaja WHERE kayttaja_id = :kayttaja_id AND ryhma_id = :ryhma_id');
        $query->execute(array('kayttaja_id' => $kayttaja_id, 'tapahtuma_id' => $tapahtuma_id));
        $row = $query->fetch();

        if ($row) {
            $perustaja = new Perustaja(array(
                'kayttaja_id' => $row['kayttaja_id'],
                'ryhma_id' => $row['ryhma_id']
            ));
            return $perustaja;
        } else {
            return null;
        }
    }

}


