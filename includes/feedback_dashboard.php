<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico" type="image/png">
    <title>Feedback Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
        }

        .sidenav {
            width: 200px;
            background-color: #4D352B;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin-bottom: 10px;
        }

        .sidenav a:hover {
            background-color: #4D352B;
        }

        .container-content {
            margin-left: 200px;
            padding: 20px;
            width: calc(100% - 200px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4D352B;
            color: white;
        }

        a {
            color: #008CBA;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #dd3333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidenav">
            <a href="../dashboard.php">Dashboard</a>
            <a href="../add.php">Add New Project</a>
        </div>
        <div class="container-content">
            <?php
            require_once 'db_handeler.php';

            $stmt = $pdo->prepare('SELECT * FROM feedback');
            $stmt->execute();
            $feedbacks = $stmt->fetchAll();

            // Display feedback in a table
            echo '<table>';
            echo '<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Message</th><th>Actions</th></tr>';

            foreach ($feedbacks as $feedback) {
                echo '<tr>';
                echo '<td>' . $feedback['id'] . '</td>';
                echo '<td>' . $feedback['full_name'] . '</td>';
                echo '<td>' . $feedback['email'] . '</td>';
                echo '<td>' . $feedback['msg'] . '</td>';
                echo '<td>';
                echo '<a href="upload_feedback.php?id=' . $feedback['id'] . '" target="_blank">Approve and Upload</a> | ';
                echo '<a href="delete_feedback.php?id=' . $feedback['id'] . '" target="_blank" " class="delete-button">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
            ?>
        </div>
    </div>
</body>
</html>
