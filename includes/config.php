<?php
// $site_url = "http://" . $_SERVER['SERVER_NAME'];

// $config = array(
// 	'tittle' => 'Game Shop',
// 	'vk_url' => 'game-shop',
// 	'favicon' => 'favicon.ico',
// 	'db' => array(
// 		'server' => 'localhost',
// 		'username' => 'root',
// 		'password' => '',
// 		'name' => 'games'
// 	)
// );

// require "db.php";


// <?php
$site_url = "http://" . $_SERVER['SERVER_NAME'];

$config = array(
  'tittle' => 'Game Shop',
  'vk_url' => 'game-shop',
  'favicon' => 'favicon.ico',
  'db' => array(
    'server' => 'localhost',
    'username' => 'root', // username to base
    'password' => '', // user password
    'name' => 'game' // database name
  )
);

require "db.php";