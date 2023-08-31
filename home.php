<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0; /* Remove default body padding */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Set height to 100vh to cover the entire viewport */
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 600px;
            margin: 20px;
        }

        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .flag-message {
            font-size: 20px;
            color: #3498db;
            font-weight: bold;
            cursor: pointer; /* Add cursor style for interaction */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .header button:hover {
            background-color: #2980b9;
        }

        .middle-section {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* Dropdown menu styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<?php
/* Mapping the user cookie to a docid that corrosponds to PII document. I know this is a terrible way to do it... */
$user = $_COOKIE['user'] ?? '';
$docid = null;

if ($user === 'Admin') {
    $docid = 1;
} elseif ($user === 'Jackson') {
    $docid = 2;
} elseif ($user === 'Josiah') {
    $docid = 3;
}
?>

<div class="container">
    <div class="header">
        <h2>Home Page</h2>
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="records.php?id=<?php echo $docid; ?>">Personal Health Document</a>
                <a href="review.php">Submit a review</a>
                <a href="fileupload.php">File Upload</a>
            </div>
        </div>
    </div>

    <div class="middle-section">
        <?php
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
        }

        echo '<p class="welcome-message">Welcome to the landing page, ' . htmlspecialchars($user) . '!</p>';
        echo '<p class="flag-message" onclick="alert(\'CTF{SQLi_Auth_Bypass_Wizard}\')">Congrats on the first flag, click here to redeem it!</p>';
        ?>
    </div>
</div>

</body>
</html>
