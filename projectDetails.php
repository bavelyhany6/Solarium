<!-- projectDetails.php -->

<?php
include('connection.php');
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "No project ID provided!";
    exit();
}

$project_id = intval($_GET['id']);

$query = "SELECT * FROM projects WHERE id = $project_id";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Project not found!";
    exit();
}

$project = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project['projectName']; ?></title>
    <link rel="icon" href="Images/favicon.ico" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
        }

        .project-details {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
        }
        .images{
            display: flex;
            justify-content: center;
            margin:20px:
        }
        .images img {
            max-width: 50%;
            margin-bottom: 10px;
        }

        .btn-container {
            margin-top: 40px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn.delete {
            background-color: #f44336;

        }

        .btn.delete:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<div class="project-details">
    <h1>Project name: <?php echo $project['projectName']; ?></h1>
    <p> Project desc: <?php echo $project['projectDesc']; ?></p>
    <div class="images">
        <?php
        $images = explode(',', $project['images']);
        foreach ($images as $image) {
            echo "<img src='$image' alt='Project Image'>";
        }
        ?>
    </div>
    <p><strong>Created at:</strong> <?php echo $project['createdAt']; ?></p>

    <div class="btn-container">
        <a href="edit.php?id=<?php echo $project_id; ?>" class="btn">Edit</a>
        <a href="dashboard.php" class="btn">All Projects</a>
        <a href="delete.php?id=<?php echo $project_id; ?>" class="btn delete">Delete</a>
    </div>
</div>

</body>
</html>
