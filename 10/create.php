<?php
$server = mysql_connect('localhost', 'root')
    or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('fusolab', $server)
    or die ("Errore nella selezione del database: " . mysql_error());

$query = "INSERT INTO {$_POST['table']} VALUES (NULL, ";

foreach ($_POST as $key => $value) {
    if($key != "table")
        $query .= "'$value',";
}
$query = rtrim($query, ",");
$query .= ")";

$ret = mysql_query($query)
    or die ("Errore nell'inserimento dei dati: " . mysql_error());

mysql_close($server);

header('Location: crud.php');