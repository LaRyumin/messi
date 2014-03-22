<div class="filter-aside">
  <div class="filter-aside-content">

    <div class="filter-aside-price">
      <form class="formula" action="#" method="post">
        <div class="form-cost">
          <h4 class="">Цена среднего чека</h4>
          <input type="text" id="min-cost" value="min"/> -
          <input type="text" id="max-cost" value="max"/>
          грн.
        </div>
        <div class="slider-cont">
          <div id="slider"></div>
        </div>
        <div class="clear"></div>
      </form>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    /* слайдер цен */
    var min = 0;
    var max = 100;
    $("#slider").slider({
      min: min,
      max: max,
      values: [min, max],
      range: true,
      stop: function(event, ui) {
        $("input#min-cost").val($("#slider").slider("values", 0));
        $("input#max-cost").val($("#slider").slider("values", 1));
      },
      slide: function(event, ui) {
        $("input#min-cost").val($("#slider").slider("values", 0));
        $("input#max-cost").val($("#slider").slider("values", 1));
      }
    });
    $("input#min-cost").change(function() {
      var value1 = $("input#min-cost").val();
      var value2 = $("input#max-cost").val();
      if (parseInt(value1) > parseInt(value2)) {
        value1 = value2;
        $("input#min-cost").val(value1);
      }
      $("#slider").slider("values", 0, value1);
    });
    $("input#max-cost").change(function() {
      var value1 = $("input#min-cost").val();
      var value2 = $("input#max-cost").val();
      if (value2 > max) {
        value2 = max;
        $("input#max-cost").val(max)
      }
      if (parseInt(value1) > parseInt(value2)) {
        value2 = value1;
        $("input#max-cost").val(value2);
      }
      $("#slider").slider("values", 1, value2);
    });
// фильтрация ввода в поля
    $('input').keypress(function(event) {
      var key, keyChar;
      if (!event)
        var event = window.event;
      if (event.keyCode)
        key = event.keyCode;
      else if (event.which)
        key = event.which;
      if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39)
        return true;
      keyChar = String.fromCharCode(key);
      if (!/\d/.test(keyChar))
        return false;
    });
  });
</script>