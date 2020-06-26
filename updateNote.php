<?php
require_once 'models/model.php';
updateNote($_POST['id'],$_POST['title'],$_POST['content'],$_POST['email']);
header("Location: /");
?>
