<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/png">
    <title>Dashboard</title>
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
        <a href="add.php">Add New Project</a>
        <a href="includes/feedback_dashboard.php">Feedbacks</a>
        <a href="index.html">Home</a>
    </div>
    <div class="container-content">
        <table>
            <tr>
                <th>Project Name</th>
                <th>Project Description</th>
                <th>Action</th>
            </tr>
            <?php
            include("connection.php");

            $query = "SELECT * FROM projects";
            $records = mysqli_query($con, $query);
            ?>
            <?php
            while ($data = mysqli_fetch_array($records)) {
                ?>
                <tr>
                    <td><a href="projectDetails.php?id=<?php echo $data['id']; ?>"><?php echo $data['projectName']; ?></a></td>
                    <td><?php echo $data['projectDesc']; ?></td>
                    <td><a href="delete.php?id=<?php echo $data['id']; ?>" class="delete-button">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
