<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$url = $_ENV['SUPABASE_URL'];
$reference_id = preg_replace('|https?://(.+?)\.supabase\.co|', '$1', $url);

$supabase = new Supabase\CreateClient(
    $_ENV['SUPABASE_KEY'],    
    $reference_id
);   

$username = null;
$password = null;
$error = null;
$data = null;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = trim(strip_tags($_POST["username"] ?? ''));
  
  if ($username === '') {
    $error = 'Please enter username';

  }
  else {
  $query = $supabase->query
      ->from('user')
      ->select('*')
      ->eq('userUsername', $username)
      ->execute();

  if (is_object($query) && method_exists($query, 'getBody')) {
      $body = json_decode((string)$query->getBody(), true);
      $data = $body['data'][0] ?? null;
  } else {
      $data = $query->data[0] ?? null;
  }
  }
}

?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Simple Login</title>
</head>
<body>
  <p>RESULTS: <?= $data['userPassword'] ?><p>

  <div class="card" role="main">
    <h1>Sign In</h1>

    <form method = "post" id="loginForm" action="<?= htmlentities($_SERVER["PHP_SELF"], ENT_QUOTES) ?>">
      <div class="field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" required="required"/>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required />
      </div>
      <button class="btn" type="submit">Log in</button>
    </form>

    <div id="welcome" class="welcome" aria-live="polite"></div>
    <p class="meta">Demo credentials: <strong>admin / password</strong></p>
  </div>
</body>
</html>