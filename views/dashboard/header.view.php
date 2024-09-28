<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/static/dashboard/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/static/dashboard/script.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <header class="navbar">
            <div class="navbar-container">
                <div></div>
                <ul class="navbar-menu">
                    <? if (auth()->isLoggedIn()): ?>
                    <li><a href="#"><?= user()?->username ?></a></li>
                    <li><a href="/logout">Logout</a></li>
                    <? else: ?>
                    <li>.</li>
                    <? endif ?>

                </ul>
            </div>
        </header>

        <!-- Sidebar -->
        <?php include 'sidebar.view.php'; ?>
        <main class="main-content">
