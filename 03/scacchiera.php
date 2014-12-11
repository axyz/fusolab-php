<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>scacchiera</title>
    <style>
     .new-line {
       clear: both; }

     .square {
       float: left;
       width: 100px;
       height: 100px; }
     .white {
       background-color: #eee; }
     .black {
       background-color: #222; }
    </style>
  </head>
  <body>
    <?php for ($x = 0; $x <= 7; $x++): ?>
      <?php for ($y = 0; $y <= 8; $y++): ?>
        <?php if ($y == 8): ?>
          <div class="new-line"></div>
        <?php elseif (($x + $y) % 2 == 0 ): ?>
            <div class="square white" ></div>
        <?php else: ?>
            <div class="square black" ></div>
        <?php endif; ?>
      <?php endfor; ?>
    <?php endfor; ?>
  </body>
</html>
