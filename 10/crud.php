<?php
$server = mysql_connect('localhost', 'root')
    or die ("Non riesco a connettermi: " . mysql_error());


$db = mysql_select_db('fusolab', $server)
    or die ("Errore nella selezione del database: " . mysql_error());




function print_table($table)
{
    $query = "SELECT * FROM " . $table;
    $res = mysql_query($query);
    $data = array();
    while ($row = mysql_fetch_assoc($res)) {
        $data[] = $row;
    }
    $colNames = array_keys(reset($data));

    echo "<table border='1'>";
    echo "<tr>";

    $form = "<tr><form action='create.php' method='post'>" .
            "<td>" . ($data[sizeof($data) - 1][$colNames[0]] + 1)  . "</td>";

    foreach($colNames as $colName) {
        echo "<th>$colName</th>";
        if ($colName != $colNames[0]) {
            $form .= "<td><input type='text' name='$colName'></td>";
        }
    }

    $form .= "<input type='hidden' name='table' value='$table'>" .
             "<td><input type='submit' value='CREATE'></td></form></tr>";

    echo "</tr>";

    foreach($data as $row) {
        echo "<tr>";
        foreach($colNames as $colName) {
            echo "<td>".$row[$colName]."</td>";
        }
        echo "<td><a href='delete.php?table={$table}&id_field={$colNames[0]}&id=" . $row[$colNames[0]] . "'>DELETE</a></td>";
        echo "</tr>";
    }
    echo $form;
    echo "</table>";
}





?>

<html>
    <body>
        <h2>Studenti:</h2>
        <?php print_table("People"); ?>
        <h2>Corsi:</h2>
        <?php print_table("Courses"); ?>
    </body>
</html>
