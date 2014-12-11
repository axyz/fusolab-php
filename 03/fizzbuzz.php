<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>fizzBuzz</title>
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
    <?php
    for ($i = 1; $i <= 100; $i++) {
      if ($i % 15 == 0) {
        echo('FizzBuzz<br>');
      } elseif ($i % 3 == 0) {
        echo('Fizz<br>');
      } elseif ($i % 5 == 0) {
        echo('Buzz<br>');
      } else {
        echo("$i<br>");
      }
    }
    ?>
  </body>
</html>
