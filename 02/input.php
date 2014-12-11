<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>ciao</title>
</head>
<body>
  <form method="post">
    <span>
      inserisci il tuo nome
      <input type="text" name="name">
      <input type="submit" value="Invia">
    </span>
  </form>
     <h2>Ciao <?= $_POST['name']; ?>!</h2>
</body>
</html>