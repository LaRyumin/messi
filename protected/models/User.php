<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

  public $repeatpassword;

  public static function model($className=__CLASS__) {
    return parent::model($className);
  }

  public function rules() {
    $parrent_rules = parent::rules();
    $rules = array(
        array('name, password', 'length', 'min' => 6),
        array('email', 'email'),
        array('name, email', 'unique'),
        array('repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"),
        array('repeatpassword', 'required'),
    );
    return $parrent_rules + $rules ;
  }

}