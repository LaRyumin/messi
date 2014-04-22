<?php

class FilterController extends Controller {

  public function actionIndex() {
    $min_price = 150;
    $max_price = 600;
    $rating = array(5, 4, 3, 2, 1);
    $cuisine = array(
      'Европейская',
      'Украинская',
      'Русская',
      'Суши-бар',
      'Японская',
      'Итальянская',
      'Пивной ресторан',
      'Восточная',
      'Сэндвич бар',
    );
    $cuisine_more = array(
      'Авторская',
      'Китайская',
      'Грузинская',
      'Средиземноморская',
      'Узбекская',
      'Французская',
      'Армянская',
      'Латиноамериканская',
      'Мексиканская',
      'Американская',
      'Тайская',
      'Рыбная',
      'Скандинавская',
    );
    $services = array(
      'Wi-Fi',
      'Завтрак',
      'Парковка',
      'Оплата (картами, наличными, мыть посуду)',
      'Спортивные трансляции',
      'Детское меню',
      'Детская комната',
      'Живая музыка',
      'Проведение банкетов',
    );
    $this->render('index', array(
      'min_price' => $min_price,
      'max_price' => $max_price,
      'rating' => $rating,
      'cuisine' => $cuisine,
      'cuisine_more' => $cuisine_more,
      'services' => $services,
    ));
  }

}
