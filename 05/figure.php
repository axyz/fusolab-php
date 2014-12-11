<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Figure</title>
  </head>

  <?php

  abstract class Figura
  {
    abstract function disegna();
  }

  Class Point extends Figura
  {
    public $x = 0;
    public $y = 0;

    function __construct($x, $y)
    {
      $this->x = $x;
      $this->y = $y;
    }

    function disegna()
    {
      echo "<div style='position:absolute;top:{$this->y}px;left:{$this->x}px;width:1px;height:1px;background-color:#000;'></div>";
    }
  }

  class Rectangle extends Figura
  {
    public $a;
    public $b;

    function __construct(Point $a, Point $b)
    {
      $this->a = $a;
      $this->b = $b;

    }

    function disegna()
    {
      for($x = $this->a->x; $x <= $this->b->x; $x++) {
        for($y = $this->a->y; $y <= $this->b->y; $y++) {
          $p = new Point($x, $y);
          $p->disegna();
        }
      }
    }
  }
  ?>

  <body>
    <?php
    $p = new Point(2, 2);
    $p->disegna();

    $r = new Rectangle(new Point(10, 10), new Point(20, 20));
    $r->disegna();
    ?>
  </body>
</html>
