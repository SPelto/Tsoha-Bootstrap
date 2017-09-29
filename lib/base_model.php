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
        if ($this->nimi == '' || $this->nimi = null) {
            $errors[] = 'Nimi ei saa olla tyhjä';
        }
        return $errors;
    }

    public function validate_puhelinnumero() {
        $errors = array();
        if ($this->puhelinnumero == '' || $this->nimi = null) {
            $errors[] = 'Puhelinnumero ei saa olla tyhjä';
        }

        if (strlen($this->puhelinnumero) != 10) {
            $errors[] = 'Puhelinnumerossa on 10 numeroa';
        }
        return $errors;
    }

    public function validate_kuvaus() {
        $errors = array();
        if ($this->kuvaus == '' || $this->nimi = null) {
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
//        Seuraavassa if lauseessa pitäisi tarkistaa että päivämäärän "muoto" on oikea. Käy pajassa kysymässä regularexpressioneista by php
        if ('placeholder' == 'placeholder') {
            
        }
        return $errors;
    }

}
