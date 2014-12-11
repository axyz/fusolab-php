<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Calcolatore</title>
  </head>

  <?php
  class Calcolatore
  {
    private $__x = 0;
    private $__y = 0;

    function __construct($x, $y)
    {
      $this->__x = $x;
      $this->__y = $y;
    }

    function push($n)
    {
      $this->__y = $n;
    }

    function add()
    {
      $ret = $this->__x + $this->__y;
      $this->__x = $ret;
      return $ret;
    }

    function subtract()
    {
      $ret = $this->__x - $this->__y;
      $this->__x = $ret;
      return $ret;
    }

    function multiply()
    {
      $ret = $this->__x * $this->__y;
      $this->__x = $ret;
      return $ret;
    }

    function divide()
    {
      $ret = $this->__x / $this->__y;
      $this->__x = $ret;
      return $ret;
    }
  }
  ?>

  <body>
    <?php
    $calcolatore = new Calcolatore(1, 2);
    echo $calcolatore->add() . '<br>';
    echo $calcolatore->add() . '<br>';
    $calcolatore->push(10);
    echo $calcolatore->multiply() . '<br>';
    $calcolatore->push(5);
    echo $calcolatore->divide() . '<br>';
    ?>
  </body>
</html>
