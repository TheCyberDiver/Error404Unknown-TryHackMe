<?php
session_start();

require_once "config.php";

if (isset($_POST['login'])) {
    $userInputUsername = $_POST['username'];
    $userInputPassword = $_POST['password'];

    // Simulate SQL injection vulnerability
    $query = "SELECT username, password FROM users WHERE username = '$userInputUsername' AND password = '$userInputPassword'";
    $result = mysqli_query($link, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];

        // Set a cookie
        setcookie('user', $row['username'], time() + 3600, '/');

        header("Location: home.php");
        exit();
    } else {
        $message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }

        .login-container {
            background-color: #fff;
            padding: 55px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            align-items: center;
        }

        .login-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        .login-form input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .login-form input[type="submit"]:hover {
            background-color: #2980b9;
            text-align: center;
        }

        .message {
            margin-top: 10px;
            color: #e74c3c;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Page</h2>

    <form class="login-form" action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>

    <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>
</div>

</body>
</html>

