<?php
$pageTitle = "Burvents | Welcome";
?>

<!--
    by:
    last modified:

    you can run this using the URL:
    https://nrs-projects.humboldt.edu/~rrm81/356FinalProject/skeleton.php

-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://nrs-projects.humboldt.edu/~st10/styles/normalize.css"
          type="text/css" rel="stylesheet" />
    <link href="https://nrs-projects.humboldt.edu/~rrm81/356FinalProject/styles.css"
          type="text/css" rel="stylesheet" />
</head>
<body>

    <!-- Main page wrapper -->
    <div class="page-container">

        <!-- Site header -->
        <header class="site-header">
            <div class="logo-area">
                <h1 class="site-logo">Burvents</h1>
            </div>

            <div class="account-actions">
                <!-- Future PHP login/account status can go here -->
                <a href="create-account.php" class="btn btn-primary">Create Account</a>
            </div>
        </header>

        <!-- Navigation / page intro -->
        <main class="main-content">
            <section class="hero-section">
                <h2>Welcome Page</h2>
                <p>
                    Welcome to Burvents. Select how you would like to use the platform.
                </p>
            </section>

            <!-- Main role / feature navigation based on your wireframe -->
            <section class="dashboard-grid">

                <article class="dashboard-card">
                    <h3>Events</h3>
                    <p>Browse or register for upcoming events.</p>
                    <a href="event-registration.php" class="btn">Go to Events</a>
                </article>

                <article class="dashboard-card">
                    <h3>Observe</h3>
                    <p>Access attendee-facing event views and updates.</p>
                    <a href="attendee-home.php" class="btn">Go to Observe</a>
                </article>

                <article class="dashboard-card">
                    <h3>Speakers</h3>
                    <p>Register as a speaker and manage proposal information.</p>
                    <a href="speaker-registration.php" class="btn">Go to Speakers</a>
                </article>

                <article class="dashboard-card">
                    <h3>Organize</h3>
                    <p>Create and manage event-related organizer tools.</p>
                    <a href="organizer-home.php" class="btn">Go to Organize</a>
                </article>

            </section>

            <!-- Placeholder for announcements or future dynamic content -->
            <section class="info-section">
                <h3>Announcements</h3>
                <p>No announcements yet.</p>

                <!-- Programmer Team:
                     Dynamic announcements / updates can be loaded here from database -->
            </section>
        </main>

        <!-- Footer -->
        <footer class="site-footer">
            <nav class="footer-nav">
                <a href="#">Feedback</a>
                <a href="#">Contact Us</a>
                <a href="#">Social Media</a>
            </nav>
        </footer>

    </div>

</body>
</html>