<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deilyer | Login</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Login Container */
        .login-container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Header */
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Input Group */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #666;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Login Button */
        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        /* Extra Links */
        .extra-links {
            margin-top: 20px;
        }

        .extra-links a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="/login" method="post">
            <div class="input-group">
                <label for="username">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" class="login-button">Login</button>
        </form>
        <br><br><br>
<!--        <div class="extra-links">-->
<!--            <a href="#">Forgot your password?</a>-->
<!--            <a href="#">Create an account</a>-->
<!--        </div>-->
    </div>
</body>
</html>
