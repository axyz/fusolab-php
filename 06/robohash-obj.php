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

  class Robohash
  {
      private $name = "";

      function __construct($name)
      {
          $this->name = $name;
      }

      function getName()
      {
          return $this->name;
      }

      function getRobot()
      {
          return "http://robohash.org/{$this->name}?set=set1";
      }

      function getMonster()
      {
          return "http://robohash.org/{$this->name}?set=set2";
      }

      function getHead()
      {
          return "http://robohash.org/{$this->name}?set=set3";
      }
  }

  ?>

  <body>
      <?php
      $axyz = new Robohash("axyz");
      ?>
      <h1><?= $axyz->getName() ?></h1>
      <img src="<?= $axyz->getRobot() ?>" />
      <img src="<?= $axyz->getMonster() ?>" />
      <img src="<?= $axyz->gethead() ?>" />
  </body>
</html>
