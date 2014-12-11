<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>mescola carte</title>
</head>
<body>
  <form method="post">
    <span>
      inserisci il mazzo
      <input type="text" name="mazzo">
      <input type="submit" value="Mescola">
    </span>
  </form>

<?php
     $mazzo = str_split($_POST['mazzo'], 2);
shuffle($mazzo);
$shuffled = implode("-", $mazzo);
?>

  <h2><?= $shuffled ?></h2>
</body>
</html>