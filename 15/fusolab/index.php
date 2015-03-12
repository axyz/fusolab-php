<?php
require 'vendor/autoload.php';
require 'fusodb.php';

$fusolab = new \Slim\Slim();

$fusolab->get('/', function () use ($fusolab)
{
  $fusolab->response->redirect($fusolab->urlFor("home"));
});

$fusolab->get('/people', function () use ($fusolab)
{
  $people = get_people();
  $fusolab->render('list.php', array(
    'people' => $people
  ));
})->name("home");

$fusolab->get('/people/:id', function ($id) use($fusolab)
{
  $person = get_person($id);
  $fusolab->render('person.php', array(
    'person' => $person
  ));
})->name("person");

$fusolab->run();
