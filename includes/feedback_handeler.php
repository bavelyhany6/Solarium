<?php
session_start(); // Start the session to access $_SESSION variables

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = $_POST["name"];
    $email = $_POST["email"];
    $msg = $_POST["message"];
   
    try {
        require_once "db_handeler.php";
        require_once "model_feed.php";
        require_once "view_feed.php";
        require_once "contr_feed.php";
   
        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($full_name, $msg, $email)) {
            $errors["empty_input"] = "Please fill in all fields.<br>";
        }

        if (is_email_invalid($email) && !empty($email)) {
            $errors["invalid_email"] = "Invalid email format.<br>";
        }

        if (!empty($errors)) {
            $_SESSION["errors_feed"] = $errors;
            header("location: ../feedback.php"); 
            exit();
        }

        create_user($pdo, $full_name, $msg, $email);

        header("location: ../feedback.php?feedback=success");
        exit();

    } catch (PDOException $e) {
        die("Request failed: " . $e->getMessage());
    }
} else {
    header("location: ../feedback.php");
    exit();
}
?>
