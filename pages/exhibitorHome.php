<?php
$pageTitle = "Exhibitor Home";

require_once '../helpers/checkLogin.php';
require_once '../helpers/sessionTimer.php';
require_once '../helpers/header.php';

//UNCOMMENT FOR PRODUCTION
//checkLogin();
//sessionTimer();
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
<?php
    if (array_key_exists('username', $_SESSION)) {
        ?>
        <p>
            <?=makeHeader("loggedIn");?>
        </p>
        <?php
    } else {
     ?>
        <p>
            <?=makeHeader("loggedOut");?>
        </p>
        <?php   
    }
?>
<body>

    <!-- Main page wrapper -->
    <div class="page-container">

        <!-- Site header -->
        <header class="site-header">
            
        </header>

        <!-- Navigation / page intro -->
        <main class="main-content">
            <section class="hero-section">
                
            </section>

            <!-- Main role / feature navigation based on your wireframe -->
            <section class="dashboard-grid">

                <article class="dashboard-card">
                    <h3>Events</h3>
                    <p>Browse or register for upcoming events.</p>
                    <a href="event-registration.php" class="btn">Go to Events</a>
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