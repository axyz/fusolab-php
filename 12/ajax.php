<!DOCTYPE html>
<html>
  <head>
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
        <form id='form'>
          <input class="input" name="text" type="text"></input>
          <input class="add button" type="submit" value="Add"></input>
        </form>
      </div>
      <ul class="list"></ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
     $(function () {
       reset();

       $('.add.button').on('click', function (e) {
         e.preventDefault();
         $.post('add.php', $('#form').serialize());
         reset();
       });

       $('.list').on('click', '.del', function (e) {
         e.preventDefault();
         $.post('delete.php', $(this).parent().serialize());
         reset();
       });
     });

     function reset() {
       $('.list').load('get.php');
       $('.input').val('');
     }
    </script>
  </body>
</html>
