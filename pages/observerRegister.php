<?php
session_start();


require_once '../helpers/checkLogin.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once '../helpers/sessionTimer.php';
require_once '../helpers/header.php';
require_once '../helpers/supabase.php';

$pageTitle = 'Event Register';

$supabase = initializeSupabase();
//UNCOMMENT FOR PRODUCTION
//checkLogin();
//sessionTimer();

if(array_key_exists('user_id', $_SESSION)){

    $event_id = $_GET['event_id'] ?? null;

    if(!$event_id) {
        header('Location: observerHome.php');
        exit();
    }

    $current_event_query = $supabase->query
                    ->from('event')
                    ->select('*')
                    ->eq('event_id', $event_id)
                    ->execute();

    $current_event = parseQuery($current_event_query);

}

if($_SERVER["REQUEST_METHOD"] == "POST"){


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link href="../css/main.css"
          type="text/css" rel="stylesheet" />
    <link href="../css/styles.css"
          type="text/css" rel="stylesheet" />
</head>
<body>
<!-- Header -->
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

    <!-- Main page wrapper -->
    <div class="page-container">

        <!-- Navigation / page intro -->
        <main class="main-content">
            <section class="hero-section">
                
            </section>

            <!-- Main role / feature navigation based on your wireframe -->
            <section class="dashboard-grid">

                <article class="dashboard-card">
                <form method="POST" action="">
                    <h1>Register For: <?= $current_event['event_name']?></h1>    
                    <p>Event Capacity: <?=  htmlentities($current_event['event_capacity'])?></p>
                    <p>Start Date: <?=  htmlentities(formatTime($current_event['event_start_time']))?></p>
                    <p>End Date: <?=  htmlentities(formatTime($current_event['event_end_time']))?></p>
                    <p>Location: <?=  htmlentities($current_event['event_location'])?></p>
                    <p><?=  htmlentities($current_event['event_description'])?></p>
                    <button class ="btn" type="submit">Register For this Event</button>

                </form>
                </article>

            </section>

            <!-- Placeholder for announcements or future dynamic content -->
            <section class="info-section">
                
            </section>
        </main>

        <!-- Footer -->
        <footer class="site-footer">
            <?php
                include_once '../helpers/footer.html';
            ?>
        </footer>

    </div>

</body>
</html>