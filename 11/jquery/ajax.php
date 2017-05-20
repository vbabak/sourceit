<?php
if (!empty($_POST)) {
    $post = json_encode($_POST);
    echo $post;
    exit;
}

?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function () {
          var form = $("#user_form");
          form.on('submit', onSubmit);
          function onSubmit(event) {
            event.preventDefault();
            $.ajax({
              url: "",
              type: "post",
              dataType: "json",
              data: {
                name: "Ivan"
              },
              success: function (response) {
                console.log(response);
              }
            });
          }
        });
    </script>
    <style type="text/css">
        .error {
            color: red;
        }

        .hide {
            display: none;
            /*visibility: hidden;*/
        }
    </style>
</head>
<body>

<h1>Валидация формы на JavaScript</h1>

<form action="" method="post" id="user_form">
    <div>
        Имя: <input type="text" id="user_name" value="" placeholder="Имя пользователя">
        <div class="error hide" id="user_name_error">Имя пользователя должно быть больше 2х символов</div>
    </div>
    <div>
        Фамилия: <input type="text" id="user_last_name" value="" placeholder="Фамилия пользователя">
        <div class="error hide" id="user_last_name_error">Фамилия пользователя должна быть больше 2х символов</div>
    </div>
    <div>
        <input type="submit" value="Отправить">
    </div>
</form>
</body>
</html>


