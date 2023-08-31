<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Submit a review!</h2>

    <form action="" method="POST">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>
        </div>

        <div class="form-group">
            <label for="body">Body:</label>
            <textarea id="body" name="body" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="user">User:</label>
            <input type="text" id="user" name="user" required>
        </div>

        <div class="form-group">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    /* Ingesting the body parameters of the review function */
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        $user = $_POST['user'];

        // Display user input (except for subject which is vulnerable)
        echo "<p>Review Submitted:</p>";
        echo "<p><strong>Title:</strong> " . htmlspecialchars($title) . "</p>";
        echo "<p><strong>Subject:</strong> $subject</p>";
        echo "<p><strong>User:</strong> " . htmlspecialchars($user) . "</p>";
        echo "<p><strong>Body:</strong> " . htmlspecialchars($body) . "</p>";
    }
    ?>
</div>

</body>
</html>
