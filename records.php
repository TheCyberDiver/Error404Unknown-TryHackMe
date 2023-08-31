<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Page</title>
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
            max-width: 800px;
            margin: 0 auto;
        }

        .file-content {
            font-size: 18px;
            margin-bottom: 20px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
    /* Ingests the URL "id" parameter and routes it to the correct doc based off of userid */
    $id = $_GET['id'] ?? '';

    $documentPaths = [
        '1' => 'User Records/Admin.php',
        '2' => 'User Records/Jackson.php',
        '3' => 'User Records/Josiah.php'
        // Add more mappings as needed
    ];

    if (isset($documentPaths[$id])) {
        $documentPath = $documentPaths[$id];
        /* Displaying the document based off of the id provided. Observe no other authorization checks occur to protect against IDOR */
        if (file_exists($documentPath)) {
            echo '<div class="file-content">';
            echo '<pre>';
            echo (file_get_contents($documentPath));
            echo '</pre>';
            echo '</div>';
        } else {
            echo '<p>Document not found for id ' . htmlspecialchars($id) . '.</p>';
        }
    } else {
        echo '<p>Invalid id.</p>';
    }
    ?>
</div>

</body>
</html>
