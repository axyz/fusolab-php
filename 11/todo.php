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
       . "<form method='post' action='delete.php'>"
       .     "<input type='hidden' name='id' value='{$row[0]}'></input>"
       .     "<input class='del button' type='submit' value='X'></input>"
       . "</form>";
    echo "</li>";
  }

}


?>

<html>
  <head>
    <title>To-Do...</title>
    <style>
     body {
       background-color: #333;
     }

     .to-do {
       width: 300px;
       margin-left: auto;
       margin-right: auto;
       margin-top: 100px;
       padding: 10px;
       border-radius: 10px;
       background-color: #eee;
     }

     .to-do .title {
       text-align: center;
       font-family: sans-serif;
     }

     .to-do .input-form .input {
       width: 256px;
     }

     .to-do .input-form .add.button {
       float: right;
     }

     .to-do .list {
       list-style-type: circle;
     }

     .to-do .list li {
       border-bottom: 1px solid #bbb;
       position: relative;
       margin-bottom: 5px;
       padding-bottom: 5px;
       left: -20px;
     }

     .to-do .list li .item {
       width: 200px;
     }

     .to-do .list li .del.button {
       display: block;
       float: right;
       margin-top: -20px;
     }
    </style>
  </head>
  <body>
    <div class="to-do">
      <h1 class="title">To-Do...</h1>
      <div class="input-form">
        <form method="post" action="add.php">
          <input class="input" name="text" type="text"></input>
          <input class="add button" type="submit" value="Add"></input>
        </form>
      </div>
      <ul class="list">
        <?php print_tasks(); ?>
      </ul>
    </div>
  </body>
</html>
