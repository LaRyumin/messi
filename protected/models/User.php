<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

  public $repeatpassword;

  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  public function rules() {
    $parrent_rules = parent::rules();
    $rules = array(
      array('name, password', 'length', 'min' => 4),
      array('password', 'validatePassword'),
      array('email', 'email'),
      array('name, email', 'unique'),
      array('repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"),
      array('repeatpassword', 'required'),
    );
    return array_merge($parrent_rules, $rules);
  }

  public function validatePassword($password) {
    return CPasswordHelper::verifyPassword($password, $this->password);
  }

  public function hashPassword($password) {
    return CPasswordHelper::hashPassword($password);
  }

  public function beforeSave() {

    if ($this->isNewRecord) {
      $this->password = $this->hashPassword($this->password);
    }

    return parent::beforeSave();
  }

}
