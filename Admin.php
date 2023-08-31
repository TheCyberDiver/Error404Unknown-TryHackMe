<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$loggedInUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Health Document</title>
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

        .document {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 20px;
        }

        .section {
            margin-bottom: 10px;
        }

        .section-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .field {
            font-size: 12px;
            margin-bottom: 2px;
        }

        .value {
            font-weight: bold;
        }

       
        .document-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <div class="document">
        <div class="section">
        <div class="section-header"> </div>
            <div class="field"> <span class="value"> </span></div>
            <div class="section-header">Personal Information</div>
            <div class="field">Date of Birth: <span class="value">Feb 19, 1990</span></div>
            <div class="field">Name: <span class="value">Admin Smith</span></div>
            <div class="field">Gender: <span class="value">Male</span></div>
            <div class="field">Social Security Number: <span class="value">1234567890</span></div>
        </div>

        <div class="section">
            <div class="section-header">Medical History</div>
            <div class="field">Blood Type: <span class="value">B-</span></div>
            <div class="field">Allergies: <span class="value">Pollen, Peanuts</span></div>
            <div class="field">Medications: <span class="value">Loratadine</span></div>
        </div>

        <div class="section">
            <div class="section-header">Contact Information</div>
            <div class="field">Address: <span class="value">456 Elm St, Townsville</span></div>
            <div class="field">Phone: <span class="value">555-987-6543</span></div>
            <div class="field">Email: <span class="value">admin@example.com</span></div>
        </div>
    </div>
</body>
</html>
