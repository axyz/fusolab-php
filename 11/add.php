<?php
$server = mysql_connect('localhost', 'root')
  or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('todo', $server)
  or die ("Errore nella selezione del database: " . mysql_error());

$query = "INSERT INTO Tasks VALUES (NULL, '{$_POST['text']}');";

$ret = mysql_query($query)
  or die ("Errore nell'inserimento dei dati: " . mysql_error());

mysql_close($server);

header('Location: todo.php');
