<ul>
<? foreach ($people as $person): ?>
<li>
  <a href="./people/<?= $person['id_person'] ?>"><?= $person['name'] ?> <?= $person['surname'] ?>
</a>
</li>
<? endforeach; ?>
</ul>
