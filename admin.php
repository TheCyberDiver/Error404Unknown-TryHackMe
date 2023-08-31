<?php
    
// Observe no other authorization checks occur to prevent the MFLAC
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once "config.php";

$searchTerm = $_POST['search'];

// Simulated SQL injection vulnerability
$query = "SELECT username FROM users WHERE username LIKE '%$searchTerm%'";
$result = mysqli_query($link, $query);

$usernames = array();
while ($row = mysqli_fetch_assoc($result)) {
    $usernames[] = $row['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            font-size: 18px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Admin Page</h2>
        <p>Search for usernames:</p>
        <form method="POST" action="admin.php">
            <input type="text" name="search" placeholder="Search">
            <input type="submit" value="Search">
        </form>
        <ul>
            <?php foreach ($usernames as $username) { ?>
                <li><?php echo htmlspecialchars($username); ?></li>
            <?php } /* The above loops through the array and prints each result. */?>
        </ul>
    </div>
</body>
</html>
