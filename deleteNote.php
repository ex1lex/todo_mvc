<?php
require_once 'models/model.php';
deleteNote($_POST['id']);
header("Location: /");
?>
