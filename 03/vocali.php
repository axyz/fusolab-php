<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>vocali</title>
  </head>
  <body>
    <form method="post">
      <span>
        inserisci il tuo nome
        <input type="text" name="string">
        <input type="submit" value="Invia">
      </span>
    </form>
    <?php
    $str = $_POST['string'];
    $vowels = array("a", "e", "i", "o", "u");
    $strArray = str_split($str);
    foreach ($strArray as $char) {
      if (in_array($char, $vowels)) {
        echo(strtoupper($char));
      } else {
        echo($char);
      }
    }
    ?>
  </body>
</html>
