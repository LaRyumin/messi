<?php

class FilterController extends Controller {

  public function actionIndex() {
    $min_price = 150;
    $max_price = 600;
    $this->render('index', array('min_price' => $min_price, 'max_price' => $max_price));
  }

}
