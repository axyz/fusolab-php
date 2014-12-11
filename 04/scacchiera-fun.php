<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>scacchiera</title>
  </head>

  <?php
  function checkerBoard ($w = 8, $h = 8, $color1 = '#eee', $color2 = '#222', $cellW = 100, $cellH = 100)
  {
    $board = "";
    for ($x = 0; $x <= ($h - 1); $x++) {
      for ($y = 0; $y <= $w; $y++) {
        if ($y == $w) {
          $board .= '<div style="clear:both;"></div>';
        } elseif (($x + $y) % 2 == 0 ) {
          $board .= "<div style='float:left;width:${cellW}px;height:${cellH}px;background-color:${color1};' ></div>";
        } else {
          $board .= "<div style='float:left;width:${cellW}px;height:${cellH}px;background-color:${color2};' ></div>";
        }
      }
    }
    return $board;
  }
  ?>

  <body>
    <?= checkerBoard(8, 4, '#eee', 'red', 100, 200) ?>
  </body>
</html>
