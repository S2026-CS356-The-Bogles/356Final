<?php
session_start();



require_once '../helpers/checkLogin.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once '../helpers/sessionTimer.php';
require_once '../helpers/header.php';
require_once '../helpers/supabase.php';

$pageTitle = "observerHome";

$supabase = initializeSupabase();

//checkLogin();
//sessionTimer();

$query = $supabase->query
    ->from('event')
    ->select('*')
    ->execute();

$data = parseQueryArray($query);




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
                <h1>Avialable Events </h1>
                <?php
                    foreach($data as $event)
                    {
                        ?>
                        <h2><?= htmlentities($event['event_name']) ?></h2>
                        <p>Event Capacity: <?=  htmlentities($event['event_capacity'])?></p>
                        <p>Start Date: <?=  htmlentities(formatTime($event['event_start_time']))?></p>
                        <p>End Date: <?=  htmlentities(formatTime($event['event_end_time']))?></p>
                        <p>Location: <?=  htmlentities($event['event_location'])?></p>
                        <p><?=  htmlentities($event['event_description'])?></p>
                        <a href="observerRegister.php?event_id=<?= urlencode($event['event_id']) ?>" >Register for this event</a>
                        <?php
                    }
                ?>
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

