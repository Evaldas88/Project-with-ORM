<?php
ini_set('display_errors', 1);
include_once './bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="./styles/style.css">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php

$url = $_SERVER['REQUEST_URI'];

switch ($url) {
   case '/Project-with-ORM/':
      require __DIR__ . '/src/views/index.php';
      break;
   case '/Project-with-ORM':
      require __DIR__ . 'src/views/index.php';
      break;
   case '/Project-with-ORM/people':
      require __DIR__ . '/src/views/people.php';
      break;
   case '/Project-with-ORM/project':
      require __DIR__ . '/src/views/project.php';
      break;

   default:
      http_response_code(404);
      require __DIR__ . '/src/views/404.php';
      break;
}
?>
</body>

</html>