<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/static/dashboard/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <div class="dashboard-container">
        <header class="navbar">
            <div class="navbar-container">
                <div></div>
                <ul class="navbar-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </header>

        <!-- Sidebar -->
        <?php include 'sidebar.view.php'; ?>
        <main class="main-content">
