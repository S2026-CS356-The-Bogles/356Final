<?php
// main landing page for the website
session_start();

require_once 'helpers/sessionTimer.php';
require_once 'helpers/header.php';

sessionTimer();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>landing page</title>

  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/main.css" />
</head>
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
<body>
    <main class="main-content">
            <section class="hero-section">
                <h2>Welcome Page</h2>
                <p>
                    Welcome to Burvents. Select how you would like to use the platform.
                </p>
            </section>

            <section class="dashboard-grid">

                <article class="dashboard-card">
                    <h3>Events</h3>
                    <p>Browse or register for upcoming events.</p>
                    <a href="#" class="btn">Go to Events</a>
                </article>

                <article class="dashboard-card">
                    <h3>Observe</h3>
                    <p>Access attendee-facing event views and updates.</p>
                    <a href="pages/observerHome.php" class="btn">Go to Observe</a>
                </article>

                <article class="dashboard-card">
                    <h3>Speakers</h3>
                    <p>Register as a speaker and manage proposal information.</p>
                    <a href="pages/speakerHome.php" class="btn">Go to Speakers</a>
                </article>

                <article class="dashboard-card">
                    <h3>Exhibitors</h3>
                    <p>Create and manage exhibit-related information.</p>
                    <a href="pages/exhibitorHome.php" class="btn">Go to Exhibitors</a>
                </article>

            </section>

            <section class="info-section">
                <h3>Announcements</h3>
                <p>No announcements yet.</p>

            </section>
        </main>
</body>
<?php
include_once 'helpers/footer.html';
?>
</html>