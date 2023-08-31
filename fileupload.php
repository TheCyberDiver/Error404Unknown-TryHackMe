<?php
/* Resume session and kick userback if they do not have a username cookie */
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Page</title>
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
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        input[type="file"] {
            display: block;
            margin-bottom: 10px;
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

        p {
            margin-top: 20px;
        }

        a {
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>File Upload Page</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="uploadedFile">
            <input type="submit" name="upload" value="Upload">
        </form>

        <?php
        /* Vulnerable File upload code without any protections. */
        if (isset($_POST['upload'])) {
            $targetDirectory = "useruploads";
            $uploadedFile = $targetDirectory . basename($_FILES["uploadedFile"]["name"]);
            $uploadSuccess = move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $uploadedFile);

            if ($uploadSuccess) {
                echo "<p>File uploaded successfully.</p>";
                echo "<a href='$uploadedFile' target='_blank'>View Uploaded File</a>";
            } else {
                echo "<p>File upload failed.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
