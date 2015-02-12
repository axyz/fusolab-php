<?php
$server = mysql_connect('localhost', 'root')
  or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('todo', $server)
  or die ("Errore nella selezione del database: " . mysql_error());

$query = "DELETE FROM Tasks WHERE id_task = {$_POST['id']}";
$ret = mysql_query($query)
  or die ("Errore nel cancellamento dei dati: " . mysql_error());

mysql_close($server);
