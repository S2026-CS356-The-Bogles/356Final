<?php
session_start();



require_once '../helpers/checkLogin.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once '../helpers/sessionTimer.php';
require_once '../helpers/header.php';
require_once '../helpers/supabase.php';

$pageTitle = "Explore Booths";

$supabase = initializeSupabase();

//checkLogin();
//sessionTimer();

if (array_key_exists('user_id', $_SESSION)) {

    $event_id = $_GET['event_id'] ?? null;

    if (!$event_id) {
        header('Location: observerHome.php');
        exit();
    }

    $booth_query = $supabase->query
        ->from('booth')
        ->select('*')
        ->eq('event_id', $event_id)
        ->execute();

    $booth = parseQueryArray($booth_query);


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
                <h1>Available Booths </h1> 
            </section>

            <!-- Main role / feature navigation based on your wireframe -->
            <section class="layout-stack">
                <article class="card-slate">
                    <?php
                        foreach($booth as $event)
                        {
                            ?>
                            <h2>Booth Building: <?= htmlentities($event['booth_building']) ?></h2>
                            <p>Booth Number: <?=  htmlentities($event['booth_number'])?></p>
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

