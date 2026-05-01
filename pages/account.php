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
  <title>Account Info</title>

  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/main.css" />
</head>
<body>
    <?php
    if (array_key_exists('username', $_SESSION)) {
        ?>
            <?=makeHeader("loggedIn");?>
        <?php
    } else {
        ?>
            <?=makeHeader("loggedOut");?> 
        <?php   
    }
    ?>
    <h1>
        Account Information
    </h1>
</body>
<?php
include_once '../helpers/footer.html';
?>
</html>