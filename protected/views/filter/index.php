<div class="filter-aside">
  <div class="filter-aside-content">

    <div class="filter-aside-price">
      <form class="formula" action="#" method="post">
        <div class="form-cost">
          <h4>Цена среднего чека</h4>
          <input type="text" id="min-cost" value="<?= $min_price ?>"/> -
          <input type="text" id="max-cost" value="<?= $max_price ?>"/>
          грн.
        </div>
        <div class="slider-cont">
          <div id="slider"></div>
        </div>
        <div class="clear"></div>
      </form>
    </div>

    <div class="filter-aside-search">
      <h4>Поиск по названию:</h4>
      <div class="search_wrapper">
        <div class="search_container">
          <input id="search" type="text">
        </div>
      </div>
    </div>

    <div class="filter-aside-rating">
      <h4>Рейтинг:</h4>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    price_slider(<?= $min_price ?>, <?= $max_price ?>);
    $("#search").autocomplete({
      source: ["Bar", "Bann", "Bre", "Bon"]
    });
  });
</script>