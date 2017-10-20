<?php

class Ryhmaperustaja extends BaseModel {

    public $kayttaja_id, $ryhma_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Ryhmaperustaja (kayttaja_id, ryhma_id) VALUES (:kayttaja_id, :ryhma_id)');
        $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'ryhma_id' => $this->ryhma_id));
    }

    public static function findPerustaja($ryhma_id) {
        $query = DB::connection()->prepare(''
                . 'SELECT * '
                . 'FROM Ryhmaperustaja rp '
                . 'JOIN Kayttaja k '
                . 'ON rp.kayttaja_id = k.id '
                . 'WHERE rp.ryhma_id = :ryhma_id');
        $query->execute(array('ryhma_id' => $ryhma_id));
        $row = $query->fetch();

        if ($row) {
            $Kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
            return $Kayttaja;
        } else {
            return null;
        }
    }

}
