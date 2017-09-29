<?php

class tapahtuma_controller extends BaseController {

    public static function tallenna_tapahtuma() {
        $params = $_POST;
        $ryhma = new Tapahtuma(array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'aika' => $params['aika']
        ));
        $ryhma->save();

        Redirect::to('/tapahtuma/lista', array('message' => 'Tapahtuma lisätty järjestelmään'));
    }

    public static function tapahtuma_new() {
        View::make('tapahtuma_new.html');
    }

    public static function tapahtuma_lista() {
        $tapahtumat = Tapahtuma::all();
        Kint::dump($tapahtumat);
        View::make('tapahtuma_lista.html', array('tapahtumat' => $tapahtumat));
    }

    public static function tapahtuma_info($id) {
        $tapahtuma = Tapahtuma::find($id);
        Kint::dump($tapahtuma);
        View::make('tapahtuma_info.html', array('tapahtuma' => $tapahtuma));
    }

    public static function tapahtuma_edit($id) {
        $tapahtuma = Tapahtuma::find($id);
        View::make('tapahtuma_edit.html', array('tapahtuma' => $tapahtuma));
    }

    public static function update($id) {
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus'],
            'aika' => $params['aika']
            );


    $tapahtuma = new Tapahtuma($attributes);
//    $errors = $tapahtuma->errors();

//    if(count($errors) > 0){
//      View::make('game/edit.html', array('errors' => $errors, 'attributes' => $attributes));
//    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää pelin tiedot tietokannassa
      $tapahtuma->update();

      Redirect::to('/tapahtuma/info/'.$id);
//    }
  }

  // Pelin poistaminen
  public static function tapahtuma_destroy($id){
    $tapahtuma = new Tapahtuma(array('id' => $id));
    $tapahtuma->destroy();

    Redirect::to('/tapahtuma/lista', array('message' => 'Peli on poistettu onnistuneesti!'));
  }
}
    
    