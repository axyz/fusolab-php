<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ordinatore</title>
  </head>

  <?php
  class Ordinatore
  {
    private $__original = array();
    private $__sorted = array();

    function __construct($arr)
    {
      $this->__original = $arr;
      sort($arr);
      $this->__sorted = $arr;
    }

    function getOriginal()
    {
      return $this->__original;
    }

    function getSorted()
    {
      return $this->__sorted;
    }
  }
  ?>

  <body>
    <?php
    $ordinatore = new Ordinatore(array(1, 5, 2, 8, 3, 6));
    print_r($ordinatore->getOriginal());
    echo '<br>';
    print_r($ordinatore->getSorted())
    ?>
  </body>
</html>
