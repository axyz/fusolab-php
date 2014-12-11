<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>antispam</title>
  </head>

  <?php
  function antispam ($mail)
  {
    $name = explode("@", $mail)[0];
    $domain = explode("@", $mail)[1];
    $domain_name = explode(".", $domain)[0];
    $domain_extension = explode(".", $domain)[1];
    return $name . '[at]' . $domain_name . '[dot]' . $domain_extension;
  }
  ?>

  <body>
    <form method="post">
      <span>
        inserisci un indirizzo email
        <input type="text" name="mail">
        <input type="submit" value="Invia">
      </span>
    </form>

    <h2><?= antispam($_POST['mail']) ?></h2>
  </body>
</html>
