<?php
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot') . '/js/jquery-1.9.1.js'));
$cs->registerCssFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot') . '/css/tic.css'));
?>

<div id="TicTacToe">

</div>

<script>
  $(document).ready(function() {
    for (var i = 1; i < 10; i++) {
      $("<div id='d" + i + "'></div>").appendTo("#TicTacToe");
    }
    var pl1 = 'X';
    var pl2 = '0';
    var pl = pl1;
    var arr = {1: '', 2: '', 3: '', 4: '', 5: '', 6: '', 7: '', 8: '', 9: ''};

    $("#TicTacToe>div").click(function() {

      if (arr[this.id.slice(-1)] === '') {
        arr[this.id.slice(-1)] = pl;
        $("#" + this.id + "").html(arr[this.id.slice(-1)]);
        $(player);
      } else {
        alert('Cell busy');
      }

      function example_function() {
        return 'example string';
      }
      ;

      console.log(arr[1]);
      $(concur);
    });

    concur = function() {
      var pl1w = "Player 1 win";
      var pl2w = "Player 2 win";
      var drawm = "Draw";

      if (concur1() !== false) {
        $('<span class="crossh p1"></span>').appendTo('#TicTacToe');
      } else if (concur2() !== false) {
        $('<span class="crossh p2"></span>').appendTo('#TicTacToe');
      } else if (concur3() !== false) {
        $('<span class="crossh p3"></span>').appendTo('#TicTacToe');
      } else if (concur4() !== false) {
        $('<span class="crossv p1"></span>').appendTo('#TicTacToe');
      } else if (concur5() !== false) {
        $('<span class="crossv p2"></span>').appendTo('#TicTacToe');
      } else if (concur6() !== false) {
        $('<span class="crossv p3"></span>').appendTo('#TicTacToe');
      } else if (concur7() !== false) {
        $('<span class="crossp p1"></span>').appendTo('#TicTacToe');
      } else if (concur8() !== false) {
        $('<span class="crossp p2"></span>').appendTo('#TicTacToe');
      }

      if (concur1() === pl1 || concur2() === pl1 || concur3() === pl1 || concur4() === pl1 ||
              concur5() === pl1 || concur6() === pl1 || concur7() === pl1 || concur8() === pl1) {
        alert(pl1w);
      } else if (concur1() === pl2 || concur2() === pl2 || concur3() === pl2 || concur4() === pl2 ||
              concur5() === pl2 || concur6() === pl2 || concur7() === pl2 || concur8() === pl2) {
        alert(pl2w);
      } else if (draw() === 1) {
        alert(drawm);
      }

    };
    concur1 = function() {
      if (arr[1] !== '' && arr[1] === arr[2] && arr[1] === arr[3]) {
        return arr[1] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur2 = function() {
      if (arr[4] !== '' && arr[4] === arr[5] && arr[4] === arr[6]) {
        return arr[4] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur3 = function() {
      if (arr[7] !== '' && arr[7] === arr[8] && arr[7] === arr[9]) {
        return arr[7] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur4 = function() {
      if (arr[1] !== '' && arr[1] === arr[4] && arr[1] === arr[7]) {
        return arr[1] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur5 = function() {
      if (arr[2] !== '' && arr[2] === arr[5] && arr[2] === arr[8]) {
        return arr[2] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur6 = function() {
      if (arr[3] !== '' && arr[3] === arr[6] && arr[3] === arr[9]) {
        return arr[3] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur7 = function() {
      if (arr[1] !== '' && arr[1] === arr[5] && arr[1] === arr[9]) {
        return arr[1] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    concur8 = function() {
      if (arr[3] !== '' && arr[3] === arr[5] && arr[3] === arr[7]) {
        return arr[3] === pl1 ? pl1 : pl2;
      }
      return false;
    };
    draw = function() {
      if (arr[1] !== '' && arr[2] !== '' && arr[3] !== '' && arr[4] !== '' && arr[5] !== '' &&
              arr[6] !== '' && arr[7] !== '' && arr[8] !== '' && arr[9] !== '') {
        return 1;
      }
    };
    player = function() {
      if (pl === pl1) {
        pl = pl2;
      } else {
        pl = pl1;
      }
    };

  });
</script>