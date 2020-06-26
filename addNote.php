<?php
require_once 'models/model.php';
addNote($_POST['title'],$_POST['email'],$_POST['content']);
header("Location: /");
?>
