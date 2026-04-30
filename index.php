<?php
// main landing page for the website
session_start();

require_once 'helpers/sessionTimer.php';
require_once 'helpers/header.php';

sessionTimer();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>landing page</title>

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
        Main page
    </h1>
</body>
</html>