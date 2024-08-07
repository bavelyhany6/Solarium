<!-- delete.php -->

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

$query = "DELETE FROM projects WHERE id = $project_id";
$result = mysqli_query($con, $query);

if ($result) {
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error deleting project: " . mysqli_error($con);
}
?>
