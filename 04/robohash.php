<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>robohash</title>
  </head>

  <?php
  function robohash ($str = false, $set = false)
  {
    $str = $str ?: rand(1, 10000);
    $set = $set ?: rand(1, 3);
    return "http://robohash.org/${str}?set=set${set}";
  }
  ?>

  <body>
    <img src="<?= robohash() ?>" />
  </body>
</html>
