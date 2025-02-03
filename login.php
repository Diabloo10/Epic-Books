<?php
session_start();
include "connection.php"; // Database connection

// Redirect if the user is already logged in
if (isset($_SESSION['userid'])) {
    header("Location: index.php");
    exit();
}

// Validate and sanitize input
if (isset($_POST["uname"], $_POST["pass"])) {
    $uname = trim($_POST["uname"]);
    $password = $_POST["pass"];

    // Check if both fields are filled
    if (empty($uname) || empty($password)) {
        header("Location: login.php?error=empty_fields");
        exit();
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM `epicbooks_users` WHERE `username` = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user's data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);

            // Set session variables
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin'] = true;
            $_SESSION['darkMode'] = $user['darkmode'];

            // Redirect to the secure area
            header("Location: index.php");
            exit();
        } else {
            // Incorrect password
            header("Location: login.php?error=incorrect_password");
            exit();
        }
    } else {
        // Invalid username
        header("Location: login.php?error=invalid_username");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted correctly, redirect to login page
    header("Location: login.php?error=invalid_request");
    exit();
}
?>
