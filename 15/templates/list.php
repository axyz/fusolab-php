<? include('header.php'); ?>
<form onsubmit="add()">
  <input id="input" type="text"/>
</form>
<ul>
<? foreach ($tasks as $task): ?>
<li>
  <?= $task['text'] ?>  [<a href onclick="erase(<?= $task['id_task'] ?>)">X</a>]
</li>
<? endforeach; ?>
</ul>
<? include('footer.php'); ?>
