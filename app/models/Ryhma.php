<?php

Class Ryhma extends BaseModel {

    public $id, $nimi, $kuvaus, $perustettu;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Ryhma');
        $query->execute();
        $rows = $query->fetchAll();
        $Ryhmat[] = array();

        foreach ($rows as $row) {
            $Ryhmat[] = new Ryhma(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'perustettu' => $row['perustettu']
            ));
        }
        return $Ryhmat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Ryhma WHERE id = :id');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $ryhma = new Ryhma(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus'],
                'perustettu' => $row['perustettu']
            ));
            return $ryhma;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Ryhma (nimi, perustettu, kuvaus) '
                . 'VALUES (:nimi, :perustettu, :kuvaus) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'perustettu' => $this->perustettu, 'kuvaus' => $this->kuvaus));
        $row = $query->fetch();
        $this->id = $row['id'];
        return $this->id;
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Ryhma SET nimi =:nimi, kuvaus =:kuvaus WHERE id=:id');
        $query->execute(array('nimi' => $this->nimi, 'kuvaus' => $this->kuvaus, 'id' => $this->id));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Ryhma WHERE id =:id');
        $query->execute(array('id' => $this->id));
    }

}
