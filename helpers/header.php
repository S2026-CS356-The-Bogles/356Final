<?php
// generic header for all pages, has logout button currently

function makeHeader($type) {
    if ($type == "loggedIn") {
$header = '
<header>
    <form action="/helpers/logout.php" method="post">
        <input type="submit" name="logout" value="logout"/>
    </form>
</header>
';
}
else if ($type == "loggedOut") {
    $header = '
    <header>
    <form action="/pages/login.php" method="post">
        <input type="submit" name="login" value="login"/>
    </form>
</header>
';
}
return $header;
}
?>