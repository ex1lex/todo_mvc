<?php
require_once 'models/model.php';
$result = register($_POST['login'],$_POST['password']);

if ($result==1) {
  while ($_COOKIE['login']=="" and $_COOKIE['password']=="") {
    setcookie("password", $_POST['password']);
    setcookie("login", $_POST['login']);
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
