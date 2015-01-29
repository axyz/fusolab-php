<?php
$server = mysql_connect('localhost', 'root')
    or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('fusolab', $server)
    or die ("Errore nella selezione del database: " . mysql_error());

$query = "DELETE FROM {$_GET['table']} WHERE {$_GET['id_field']} = {$_GET['id']}";
$ret = mysql_query($query)
    or die ("Errore nel cancellamento dei dati: " . mysql_error());

mysql_close($server);

header('Location: crud.php');