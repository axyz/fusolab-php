<?php
$server = mysql_connect('localhost', 'root')
  or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('todo', $server)
  or die ("Errore nella selezione del database: " . mysql_error());

function print_tasks()
{
  $query = "SELECT * FROM Tasks";
  $res = mysql_query($query);
  $data = array();
  while ($row = mysql_fetch_array($res)) {
    $data[] = $row;
  }
  $data = array_reverse($data);

  foreach($data as $row) {
    echo "<li>";
    echo $row[1]
       . "<form class='del'>"
       .     "<input type='hidden' name='id' value='{$row[0]}'></input>"
       .     "<input class='del button' type='submit' value='X'></input>"
       . "</form>";
    echo "</li>";
  }
}

print_tasks();

mysql_close($server);
