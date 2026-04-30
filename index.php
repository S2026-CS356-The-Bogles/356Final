// main landing page for the website
<?php
session_start();

require 'helpers/checkLogin.php';
require 'helpers/sessionTimer.php';

checkLogin();
sessionTimer();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Simple Login</title>

  <link rel="stylesheet" href="../css/main.css" />
</head>
<body>
    <?php
    include 'helpers/header.html';
    ?>
    <h1>
        Welcome, <?= $_SESSION['username'] ?>
    </h1>
</body>
</html>