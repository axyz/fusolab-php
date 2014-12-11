<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inizializzato</title>
  </head>

  <?php
  class Inizializzato
  {
    function __construct()
    {
      echo "Sono stato inizializzato!";
    }
  }
  ?>

  <body>
    <?php
    $obj = new Inizializzato();
    ?>
  </body>
</html>
