<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>antispam</title>
  </head>
  <body>
    <form method="post">
      <span>
        inserisci un indirizzo email
        <input type="text" name="mail">
        <input type="submit" value="Invia">
      </span>
    </form>

    <?php
    $mail = $_POST['mail'];
    $name = explode("@", $mail)[0];
    $domain = explode("@", $mail)[1];
    $domain_name = explode(".", $domain)[0];
    $domain_extension = explode(".", $domain)[1];
    $antispam = $name . '[at]' . $domain_name . '[dot]' . $domain_extension;
    ?>

    <h2><?= $antispam ?></h2>
  </body>
</html>
