function price_slider(min, max) {  
  /* слайдер цен */
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
}