<?php 
include('connection.php'); 
session_start();

if (isset($_POST['sub'])) { 
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
    }

    // Insert project details into database
    $sql = "INSERT INTO projects (projectName, projectDesc, images, createdAt) VALUES ('$project_n', '$project_desc', '" . implode(',', $image_destination_array) . "', NOW())";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $project_id = mysqli_insert_id($con); // Get the last inserted ID
        $_SESSION['ProjectName'] = $project_n;
        header("Location: projectDetails.php?id=" . $project_id); 
        exit(); 
    } else { 
        echo "Error: " . mysqli_error($con); 
    }
} 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <link rel="icon" href="Images/favicon.ico" type="image/png">
    <link rel="stylesheet" href="css/add.css" />
    <title>Add Project</title>
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
    <input type="text" name="ProjectName" required><br>

    <label for="project_description">Project Description:</label>
    <input type="text" name="ProjectDesc" required><br>

    <label for="images">Upload Image(s):</label>
    <input type="file" name="image[]" accept="image/*" multiple required><br>

    <button type="submit" value="submit" name="sub" class="bt">Submit</button>
</form>

</body>
</html>
