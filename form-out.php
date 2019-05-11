<?php
require "includes/config.php";

unset($_SESSION['id_client']);
unset($_SESSION['login']);

// echo 'http://' . $_SERVER['HTTP_HOST'];

$url = $_SERVER['HTTP_REFERER'];
header('Location: ' .$url);
// header('Location: ' . 'http://' . $_SERVER['HTTP_HOST']);

// echo "Lol";

?>