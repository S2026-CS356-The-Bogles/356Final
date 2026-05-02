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
    ->from('events')
    ->select('*')
    ->execute();

$data[] = parseQuery($query);



/*
$event_name = $data['event_name'];
$event_cap = $data['event_capacity'];
$event_start = $data['event_start_time'];
$event_end = $data['event_end_time'];
$event_location = $data['event_location'];
$event_desc = $data['event_location'];
*/


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
                   
                </article>

            </section>

            <!-- Placeholder for announcements or future dynamic content -->
            <section class="info-section">
                <?php
                    foreach($data as $event[])
                    {
                        ?>
                        <h2><?= htmlentities($event['event_name']) ?></h2>
                        <p><?=  htmlentities($event['event_capacity'])?></p>
                        <p><?=  htmlentities($event['event_start_time'])?></p>
                        <p><?=  htmlentities($event['event_end_time'])?></p>
                        <p><?=  htmlentities($event['event_location'])?></p>
                        <p><?=  htmlentities($event['event_description'])?></p>
                        <?php
                    }
                ?>
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





?>