<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/static/dashboard/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <header class="navbar">
            <div class="navbar-container">
                <div></div>
<!--                <div class="navbar-brand">-->
<!--                    <h1>Admin Panel</h1>-->
<!--                </div>-->
                <ul class="navbar-menu">
                    <li><a href="#">Home</a></li>
<!--                    <li><a href="#">Settings</a></li>-->
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </header>

        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul class="menu">
                <li>
                    <a href="#" class="menu-item">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="menu-item">Users</a>
                    <ul class="submenu">
                        <li><a href="#">Add User</a></li>
                        <li><a href="#">Manage Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-item">Settings</a>
                    <ul class="submenu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-item">Reports</a>
                </li>
                <li><a href="#" class="menu-item">Logout</a></li>
            </ul>
        </aside>


        <!-- Main Content -->
        <main class="main-content">
            <h1>Welcome to the Admin Dashboard</h1>
            <div class="form-container">
                <form action="#">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="input-field">
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea id="comments" class="textarea-field"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="radio-group">
                            <label><input type="radio" name="gender" value="male"> Male</label>
                            <label><input type="radio" name="gender" value="female"> Female</label>
                            <label><input type="radio" name="gender" value="other"> Other</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hobbies">Hobbies</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="hobbies" value="reading"> Reading</label>
                            <label><input type="checkbox" name="hobbies" value="traveling"> Traveling</label>
                            <label><input type="checkbox" name="hobbies" value="sports"> Sports</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="input-field">
                            <option value="usa">USA</option>
                            <option value="canada">Canada</option>
                            <option value="uk">UK</option>
                            <option value="australia">Australia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="languages">Languages Known</label>
                        <select id="languages" class="input-field" multiple>
                            <option value="english">English</option>
                            <option value="spanish">Spanish</option>
                            <option value="french">French</option>
                            <option value="german">German</option>
                            <option value="chinese">Chinese</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>
        </main>
<!--        <br><br><br>-->
    </div>

    <script src="/static/dashboard/script.js"></script>
</body>
</html>
