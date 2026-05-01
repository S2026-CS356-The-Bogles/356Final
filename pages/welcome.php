<?php
//welcome page after logging in
session_start();

require '../helpers/checkLogin.php';
require '../helpers/sessionTimer.php';
require_once '../helpers/header.php';

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
    if (array_key_exists('username', $_SESSION)) {
        ?>
        <p>
            <?=makeHeader("loggedIn");?>
        </p>
        <?php
    } else {
     ?>
        <p>
            <?=makeHeader("loggedOut");?>
        </p>
        <?php   
    }
    ?>
    <h1>
        Welcome, <?= $_SESSION['username'] ?>
    </h1>
</body>
</html>