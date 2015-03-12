<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=fusolab;charset=utf8', 'root');
} catch(PDOexception $ex) {
  die($ex);
}

function get_people()
{
  global $db;
  return $db
    ->query("SELECT * FROM People")
    ->fetchAll(PDO::FETCH_ASSOC);
}

function get_person($id)
{
  global $db;
  $person = $db
    ->query("SELECT * FROM People WHERE id_person = $id")
    ->fetchAll(PDO::FETCH_ASSOC)[0];
  return ($person === [])? false : $person;
}


