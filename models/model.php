<?php
function updateNote($id,$title,$content,$email)
{
  $pdo = new PDO("mysql:host=localhost;dbname=todo_bd","root","");
  $statement = $pdo->prepare("UPDATE list SET name='$title', content='$content', email='$email' WHERE id=$id");
  $statement->execute();
}
function deleteNote($id)
{
  $pdo = new PDO("mysql:host=localhost;dbname=todo_bd","root","");
  $statement = $pdo->prepare("DELETE FROM list WHERE id=$id");
  $statement->execute();
}
function addNote($title,$email,$content)
{
  $pdo = new PDO("mysql:host=localhost;dbname=todo_bd","root","");
  $statement = $pdo->prepare("INSERT INTO list (name,content,email) VALUES ('$title','$content','$email')");
  $statement->execute();
}

function getData()
{
  $pdo = new PDO("mysql:host=localhost;dbname=todo_bd","root","");
  $statement = $pdo->prepare("SELECT * FROM list");
  $statement->execute();
  $masNote = array();
  $masNote = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $masNote;
}

function login($login,$password)
{
  $pdo = new PDO("mysql:host=localhost;dbname=todo_bd","root","");
  $statement = $pdo->prepare("SELECT login,password FROM users WHERE (login='$login' and password='$password')");
  $statement->execute();
  $mas = array();
  $mas = $statement->fetchAll();
  $check=0;
  foreach ($mas as $value) {
    if ($value['login'] and $value['password']) {
      $check=1;
    }
  }
  return $check;
}

function register($login,$password)
{
  $pdo = new PDO("mysql:host=localhost;dbname=todo_bd","root","");
  $statement = $pdo->prepare("INSERT INTO users (login,email,password) VALUES ('$login','12','$password')");
  $statement->execute();
  return 1;
}

function logOut()
{
  setcookie("login", "");
  setcookie("password", "");
}

function getUser()
{
  $mas = array();
  $mas[0]=$_COOKIE['login'];
  $mas[1]=$_COOKIE['password'];
  // if(isset($_COOKIE['login']) and ($_COOKIE['password'])!="")
  // {
  //   $mas[0]=$_COOKIE['login'];
  //   $mas[1]=$_COOKIE['password'];
  //   $mas[2]=$_COOKIE['alert'];
  // } else {
  //   $mas[0]="";
  //   $mas[1]="";
  //   $mas[2]=$_COOKIE['alert'];
  // }
  return $mas;
}
?>
