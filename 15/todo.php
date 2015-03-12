<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8', 'root');
} catch(PDOexception $ex) {
  die($ex);
}

/**
 * Ritorna la lista dei task nella forma di un array di array associativi.
 * Quindi per ognuno dei suoi elementi si avranno a disposizione i campi:
 *
 * $elemento['id_task'] con l'id univoco del task
 *
 * $elemento['text'] con il testo del task
 */
function get_tasks()
{
  global $db;
  return $db
    ->query("SELECT * FROM Tasks")
    ->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Ritorna un array associativo rappresentante il task con l'id specificato
 * contenente i campi:
 *
 * $elemento['id_task'] con l'id univoco del task
 *
 * $elemento['text'] con il testo del task
 *
 * se non esiste un task con l'id specificato la funzione ritorna false
 */
function get_task($id)
{
  global $db;
  $task = $db
    ->query("SELECT * FROM Tasks WHERE id_task = $id")
    ->fetchAll(PDO::FETCH_ASSOC)[0];
  return ($task === [])? false : $task;
}

/**
 * Crea un nuovo task con il testo specificato.
 * Se per qualunque motivo non viene creato nessun nuovo task la funzione
 * ritorna 0 che PHP interpreta come false
 */
function add_task($text)
{
  global $db;
  return $db->exec("INSERT INTO Tasks VALUES (NULL, '$text')");
}

/**
 * Elimina il task con l'id specificato.
 * Se per qualunque motivo non viene creato nessun nuovo task la funzione
 * ritorna 0 che PHP interpreta come false
 */
function delete_task($id)
{
  global $db;
  return $db->exec("DELETE FROM Tasks WHERE id_task = $id");
}

/**
 * Modifica il task avente l'id specificato sostituendo il suo campo text con
 * una nuova stringa.
 *
 * Qualora non esista alcun task con l'id specificato ne verrà creato uno.
 */
function edit_task($id, $text)
{
  global $db;
  $db->exec("UPDATE Tasks SET text = '$text' WHERE id_task = $id")
    || $db->exec("INSERT INTO Tasks VALUES ($id, '$text')");
}

