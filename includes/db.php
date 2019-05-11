<?php

$connection = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['name']
);

if($connection == false)
{
	echo 'Not good<br>';
	echo mysqli_connect_error();
	exit();
}

session_start();

function quote($var)    {
  return mysqli_real_escape_string($connection, $var);
}

function cutStr($var, $c)    {
	return mb_substr(strip_tags($var), 0, $c, 'utf-8') . '...';
}

function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

?>