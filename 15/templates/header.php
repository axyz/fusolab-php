<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
    $(function () {
      $('#input').focus();
    })

    function erase(id) {
      $.ajax({
        url:'todos/' + id,
        type: 'DELETE',
      });
    }

    function add() {
      $.post('todos', {text: $('#input').val()}, function () {
        $('#input').val('');
      });
    }
  </script>
</head>
<body>

