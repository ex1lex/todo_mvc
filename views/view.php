<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="login" align="center">
      <?php
      if ($user[0]!="" and $user[0]!="Неправильно введены данные") {?>
        <h2>Пользователь: <?=$user[0]?></h2><h2><a href="logOut.php">Выход</a></h2>
      <?} else {?>
        <div class="">
          <h2><?=$user[2];?></h2>
          <h2>ВХОД / РЕГИСТРАЦИЯ</h2>
          <form class="" method="post">
            <input type="text" required placeholder="login" required name="login" value=""><br>
            <input type="password" required placeholder="password" required name="password" value=""><br>
            <button type="submit" formaction="login.php" name="button">Вход</button> /
            <button type="submit" formaction="register.php" name="button">Регистрация</button>
          </form>
        </div>
      <?}
      ?>
    </div>
    <h1 align="center">Добавить новую задачу</h1>
    <div class="noteAdd">
      <style media="screen">
        .noteAdd input{
          width: 810px;
        }
        .noteAdd textarea{
          width: 810px;
          height:100px;
        }
        button{
          height: 30px;
        }
      </style>
      <form class="" action="addNote.php" method="post" align="center">
        <input type="text" required name="title" placeholder="Название задачи" value=""><br>
        <input type="email" required name="email" placeholder="Почта" value=""><br>
        <textarea type="text" required name="content" placeholder="Текст задачи" value=""></textarea><br>
        <button type="submit" name="button" style="width: 300px;">Добавить задачу</button>
      </form>
    </div>
    <h1 align="center">Список задач</h1>
    <table align="center">
      <?php foreach ($data as $item) {?>
        <tr>
          <td style="width: 750px;border: 2px solid gray;padding: 20px 30px;margin: 0 0;">
            <form class="" method="post">
              <style media="screen">
              body{
                margin-bottom: 200px;
              }
                .note input{
                  width: 500px;
                }
                .note textarea{
                  width: 502px;
                  height:100px;
                }
              </style>
              <div class="note">
                <?php if ($user[0]=="admin"){?>
                  <input type="text" placeholder="Название задачи" name="title" value="<?=$item['name']?>"><br>
                  <input type="email" placeholder="Почта" name="email" value="<?=$item['email']?>"><br>
                  <textarea type="text" placeholder="Текст задачи" name="content"><?=$item['content']?></textarea><br>
                  <input type="text" hidden name="id" value="<?=$item['id']?>">
                  <button type="submit" formaction="deleteNote.php" name="button1" style="float: right;">Удалить</button>
                  <button type="submit" formaction="updateNote.php" fname="button2" style="float: right;">Изменить</button>
                <?} else {?>
                  <input type="text" placeholder="Название задачи" disabled name="title" value="<?=$item['name']?>"><br>
                  <input type="email" placeholder="Почта" disabled name="email" value="<?=$item['email']?>"><br>
                  <textarea type="text" placeholder="Текст задачи" disabled name="content"><?=$item['content']?></textarea><br>
                  <input type="text" hidden name="id" value="<?=$item['id']?>">
                  <button type="submit" formaction="deleteNote.php" name="button1" style="float: right;">Удалить</button>
                <?} ?>

              </div>
            </form>
          </td>
        </tr>
      <?} ?>
    </table>
  </body>
</html>
