<?php
// main page for logging users into the website
// if user is already logged in, redirects them to the index (main) page

session_start();

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
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

  if (array_key_exists('user_id', $_SESSION)) {
    header('Location: welcome.php');
    exit();
  }

  $username = trim(strip_tags($_POST["username"] ?? ''));
  
  if ($username === '') {
    $error = 'Please enter username';

  }
  else {
  $query = $supabase->query
      ->from('system_user')
      ->select('*')
      ->eq('user_username', $username)
      ->execute();

  if (is_object($query) && method_exists($query, 'getBody')) {
      $body = json_decode((string)$query->getBody(), true);
      $data = $body['data'][0] ?? null;
  } else {
      $data = $query->data[0] ?? null;
  }
  
  $password = $_POST['password'] ?? '';

  if ($data == null) {
    $error = 'User not found';
  }
  else {
    $stored_pass = $data['user_password'];

    if($stored_pass !== '' and password_verify($password, $stored_pass))
    {
      $password_confirmed = true;
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['username'] = $data['user_username'];
      header('Location: welcome.php');
      exit();
    }
    elseif($password == $stored_pass)
    {
      $password_confirmed = true;
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['username'] = $data['user_username'];
      header('Location: welcome.php');
      exit();
    }
    else {
      $error = 'wrong password';
    }

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

  <link rel="stylesheet" href="../css/main.css" />
</head>
<body>
  <div class="card" role="main">
    <h1>Sign In</h1>

    <p class="error">
    <?=$error?>
    </p>

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
</body>
<footer>
  <div class="container">
    <a href="signup.php" class="button">Create Account</a> 
  </div>
</footer>

</html>