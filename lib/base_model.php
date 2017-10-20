<?php

class BaseModel {

    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null) {
        // Käydään assosiaatiolistan avaimet läpi
        foreach ($attributes as $attribute => $value) {
            // Jos avaimen niminen attribuutti on olemassa...
            if (property_exists($this, $attribute)) {
                // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
                $this->{$attribute} = $value;
            }
        }
    }

    public function errors() {
        // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
        $errors = array();

        foreach ($this->validators as $validator) {
            // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
            $errors = array_merge($errors, $this->{$validator}());
        }

        return $errors;
    }

    public function validate_nimi() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä';
        }
        if (strlen($this->nimi) < 2) {
            $errors[] = 'Nimen on oltava yli kaksi merkkiä pitkä';
        }
        return $errors;
    }

    public function validate_kuvaus() {
        $errors = array();
        if ($this->kuvaus == '' || $this->nimi == null) {
            $errors[] = 'Kuvaus ei voi olla tyhjä';
        }
        if (strlen($this->kuvaus) < 5) {
            $errors[] = 'Ei muuten riitä alle viisimerkkiä minkään kuvaamiseen (täysin arbitraali valinta tuo 5)';
        }
        return $errors;
    }

    public function validate_timestamp() {
        $errors = array();
        if ($this->aika == null) {
            $errors[] = 'Tapahtumalla täytyy olla ajankohta';
        }
        
        if (strlen($this->aika) < 8) {
            $errors[] = 'Päivämäärän kirjoittamiseen menee ainakin kahdeksan merkkiä';
        }
        return $errors;
    }

    public function validate_username() {
        $errors = array();
        if ($this->username == '' || $this->username == null) {
            $errors[] = 'Käyttäjätunnus ei voi olla tyhjä';
        }
        if (strlen($this->username) < 3) {
            $errors[] = 'Käyttäjätunnuksen on oltava vähintään kolme merkkiä';
        }
        return $errors;
    }

    public function validate_password() {
        $errors = array();
        if ($this->password == '' || $this->password == null) {
            
        }
        if (strlen($this->password) < 4) {
            $errors[] = 'Salasanan on oltava vähintään neljä merkkiä';
        }
        return $errors;
    }

}
