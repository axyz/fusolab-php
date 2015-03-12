<?php
require 'vendor/autoload.php';
require 'todo.php';

$todo = new \Slim\Slim();

$todo->get('/', function () use ($todo)
{
  $todo->response->redirect($todo->urlFor("home"));
});

$todo->get('/todos', function () use ($todo)
{
  $tasks = get_tasks();
  $todo->render('./list.php', array(
    'tasks' => $tasks
  ));
})->name("home");

$todo->get('/todos/:id', function ($id) use ($todo)
{
  $task = get_task($id);
  $todo->render('single.php', array(
    'task' => $task
  ));
});

$todo->post('/todos', function () use ($todo)
{
  add_task($todo->request->post('text'));
});

$todo->put('/todos/:id', function ($id) use ($todo)
{
  edit_task($id, $todo->request->put('text'));
});

$todo->delete('/todos/:id', function ($id) use ($todo)
{
  delete_task($id);
});

$todo->run();

