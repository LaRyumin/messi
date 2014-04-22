<form action="POST">
  <div class="filter-aside">
    <div class="filter-aside-content">

      <div class="filter-aside-price">
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
      </div>

      <div class="filter-aside-search">
        <h4>Поиск по названию</h4>
        <div class="search_wrapper">
          <div class="search_container">
            <input id="search" type="text">
          </div>
        </div>
      </div>

      <div class="filter-aside-rating">
        <h4>Рейтинг</h4>
        <div class="rating_house">
          <? foreach ($rating as $rat): ?>
            <label for="rat<?= $rat ?>">
              <input id="rat<?= $rat ?>" type="checkbox" name="rat<?= $rat ?>">
              <span class="rat<?= $rat ?>"></span>
            </label>
          <? endforeach; ?>
          <label class="rat0">
            <input id="rat0" type="checkbox" name="rat0">
            без рейтинга
          </label>
        </div>
      </div>

      <div class="filter-aside-cuisine">
        <h4>Выбор кухни</h4>
        <div class="cuisine">
          <? foreach ($cuisine as $v => $c): ?>
            <label for="cuisine<?= $v ?>">
              <input id="cuisine<?= $v ?>" type="checkbox" name="cuisine<?= $v ?>">
              <span><?= $c ?></span>
            </label>
          <? endforeach; ?>

          <div id="cuisine_more">Другие...</div>
          <div id="cuisine_more_list">
            <? foreach ($cuisine_more as $v => $c): ?>
              <label for="cuisine_more<?= $v ?>">
                <input id="cuisine_more<?= $v ?>" type="checkbox" name="cuisine_more<?= $v ?>">
                <span><?= $c ?></span>
              </label>
            <? endforeach; ?>
          </div>
        </div>
      </div>

      <div class="filter-aside-services">
        <h4>Услуги и удобства</h4>
        <div class="services">
          <? foreach ($services as $v => $s): ?>
            <label for="service<?= $v ?>">
              <input id="service<?= $v ?>" type="checkbox" name="service<?= $v ?>">
              <span class="service<?= $v ?>"></span>
              <?= $s ?>
            </label>
          <? endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</form>

<script>
  $(document).ready(function() {
    // Choose price
    price_slider(<?= $min_price ?>, <?= $max_price ?>);
    // Search by name
    $("#search").autocomplete({
      source: <?= json_encode($cuisine) ?>
    });

    // show/hide more cuisines
    $("#cuisine_more").click(function() {
      if ($("#cuisine_more_list").is(":hidden")) {
        $("#cuisine_more_list").show("slow");
      } else {
        $("#cuisine_more_list").hide("slow");
      }
      return false;
    });


  });
</script>