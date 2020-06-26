<?php
require_once 'models/model.php';
$result = login($_POST['login'],$_POST['password']);

if ($result==1) {
  while ($_COOKIE['login']=="" and $_COOKIE['password']=="") {
    setcookie("login", $_POST['login']);
    setcookie("password", $_POST['password']);

    break;
  }
  header("Location: /");
} else {
  while ($_COOKIE['login']=="" and $_COOKIE['password']=="") {
    setcookie("login", "");
    setcookie("password", "");
    break;
  }
  header("Location: /");
}
?>
