<?php

Class Tapahtuma extends BaseModel {

    public $id, $nimi, $kuvaus, $aika;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Tapahtuma');
        $query->execute();
        $rows = $query->fetchAll();
        $tapahtumat[] = array();

        foreach ($rows as $row) {
            $tapahtumat[] = new tapahtuma(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'aika' => $row['aika']
            ));
        }
        return $tapahtumat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tapahtuma WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $tapahtuma = new Ryhma(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'aika' => $row['aika']
            ));
            return $tapahtuma;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Tapahtuma (nimi, kuvaus, aika) '
                . 'VALUES (:nimi, :kuvaus, :aika) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'kuvaus' => $this->kuvaus, 'aika' => $this->aika));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Tapahtuma SET nimi =:nimi, kuvaus =:kuvaus, aika=:aika WHERE id=:id');
        $query->execute(array('nimi' => $this->nimi, 'kuvaus' => $this->kuvaus, 'aika' => $this->aika, 'id' => $this->id));
    }
    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Tapahtuma WHERE id =:id');
        $query->execute(array('id' => $this->id));
    }

}
