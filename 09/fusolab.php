<?php
$server = mysql_connect('localhost', 'root')
  or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('fusolab', $server)
  or die ("Errore nella selezione del database: " . mysql_error());




function print_table($res)
{
  $data = array();
  while ($row = mysql_fetch_assoc($res)) {
    $data[] = $row;
  }
  $colNames = array_keys(reset($data));

  echo "<table border='1'>";
  echo "<tr>";

  foreach($colNames as $colName) {
    echo "<th>$colName</th>";
  }

  echo "</tr>";

  foreach($data as $row) {
    echo "<tr>";
    foreach($colNames as $colName) {
      echo "<td>".$row[$colName]."</td>";
    }
    echo "</tr>";
  }

  echo "</table>";
}





?>

<html>
  <body>
    <h2>Studenti:</h2>
    <?php
    $query = "SELECT * FROM CourseAttendersView";
    $result = mysql_query($query);
    ?>
    <?php print_table($result); ?>

    <br>

    <h2>Docenti:</h2>
    <?php
    $query = "SELECT * FROM CourseHoldersView";
    $result = mysql_query($query);
    ?>
    <?php print_table($result); ?>
  </body>
</html>
