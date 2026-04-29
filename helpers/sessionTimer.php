<?php

function sessionTimer() {

    $session_timeout = 60; // 1800 = 30 minutes

    if (isset($_SESSION["last_activity"])) {
        $elapsed_time = time() - $_SESSION["last_activity"];
        if ($elapsed_time > $session_timeout) {
            session_unset();
            session_destroy();
            header("Location: ../index.php");
            exit();
        }
    }

    $_SESSION['last_activity'] = time();
}
?>