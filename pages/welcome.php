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
  <title>Welcome page</title>

  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/styles.css" />
</head>
<body class="main-content">
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
        Welcome, <?= $_SESSION['username'] ?>
    </h1>

    <div id="welcome-section">
        <h2>
            What would you like to do?
        </h2>

        <ul id="welcome-options" class="account-actions">
            <!--temporary links REPLACE!!! 
            Make them register if account is NOT a specific type
            and if they are, make it go to the main page for that type-->
            <li> <a href="#"> Get Tickets </a> </li>
            <li> <a href="exhibitorHome.php"> Exhibitor Home </a> </li>
            <li> <a href="speakerHome.php"> Speaker Home </a> </li>
            <li> <a href="#"> Organizer Home </a> </li>
        </ul>
    </div>
</body>
<?php
include_once '../helpers/footer.html';
?>
</html>