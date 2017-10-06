<?php

Class Liitostaulu extends BaseModel {

    public $kayttaja_id, $ryhma_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function find($kayttaja_id, $ryhma_id) {
        $query = DB::connection()->prepare('SELECT * FROM Liitostaulu WHERE kayttaja_id = :kayttaja_id AND ryhma_id = :ryhma_id');
        $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'ryhma_id' => $this->ryhma_id));
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

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Liitostaulu (kayttaja_id, ryhma_id) VALUES(:kayttaja_id, :ryhma_id)');
        $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'ryhma_id' => $this->ryhma_id));
    }

}
