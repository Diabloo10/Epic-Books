<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userid'])) {
    http_response_code(401);
    echo "Unauthorized: User not logged in.";
    exit;
}

// Get the theme preference from the AJAX request
if (isset($_POST['theme'])) {
    $theme = $_POST['theme']; // 'Y' or 'N'
    $userId = $_SESSION['userid']; // Assuming userid is stored in the session

    // Validate input
    if (!in_array($theme, ['Y', 'N'])) {
        http_response_code(400);
        echo "Invalid theme preference.";
        exit;
    }

  include "connection.php";

    // Update the user's theme preference
    $stmt = $conn->prepare("UPDATE epicbooks_users SET darkmode = ? WHERE id = ?");
    $stmt->bind_param("si", $theme, $userId);

    if ($stmt->execute()) {
        echo "Theme preference updated successfully.";
    } else {
        http_response_code(500);
        echo "Error updating theme preference: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    http_response_code(400);
    echo "Theme preference not provided.";
}
