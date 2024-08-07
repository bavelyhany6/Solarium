<!-- edit.php -->

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

// Fetch project details
$query = "SELECT * FROM projects WHERE id = $project_id";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Project not found!";
    exit();
}

$project = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['update'])) {
    $project_n = mysqli_real_escape_string($con, $_POST['ProjectName']);
    $project_desc = mysqli_real_escape_string($con, $_POST['ProjectDesc']);
    
    // Handle multiple image uploads
    $image_destination_array = [];
    
    if (!empty($_FILES['image']['name'][0])) {
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $image_name = $_FILES['image']['name'][$key];
            $image_tmp = $_FILES['image']['tmp_name'][$key];
            $image_destination = 'uploads/' . time() . '_' . $image_name;

            if (move_uploaded_file($image_tmp, $image_destination)) {
                $image_destination_array[] = $image_destination;
            } else {
                echo "Error uploading image: $image_name";
            }
        }
    } else {
        // If no new images are uploaded, keep the old ones
        $image_destination_array = explode(',', $project['images']);
    }
    
    $images_string = implode(',', $image_destination_array);

    // Update project details in database
    $update_query = "UPDATE projects SET projectName='$project_n', projectDesc='$project_desc', images='$images_string' WHERE id=$project_id";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        header("Location: projectDetails.php?id=$project_id");
        exit();
    } else {
        echo "Error updating project: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="Images/favicon.ico" type="image/png">
    <title>Edit Project</title>
    <style>
        body {
            background-color: #f1f1f1;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            background-color: white;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .bt {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .bt:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <label>Project Name:</label>
    <input type="text" name="ProjectName" value="<?php echo $project['projectName']; ?>" required><br>

    <label for="project_description">Project Description:</label>
    <input type="text" name="ProjectDesc" value="<?php echo $project['projectDesc']; ?>" required><br>

    <label for="images">Upload New Image(s):</label>
    <input type="file" name="image[]" accept="image/*" multiple><br>
    
    <p>Current Images:</p>
    <div class="current-images">
        <?php
        $images = explode(',', $project['images']);
        foreach ($images as $image) {
            echo "<img src='$image' alt='Project Image' style='max-width:100px;margin-right:10px;'>";
        }
        ?>
    </div>

    <button type="submit" value="update" name="update" class="bt">Update</button>
</form>

</body>
</html>
