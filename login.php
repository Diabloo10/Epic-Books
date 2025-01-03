<?php
session_start();
include "connection.php"; // Database connection

// Retrieve and sanitize input
$uname = trim($_POST["uname"]);
$password = $_POST["pass"];

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
        // Set session variables
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['loggedin'] = true;
        $_SESSION['darkMode'] = $user['darkmode'];
        
        ?>
        <script>
        // Set theme based on PHP session variable
        const userTheme = "<?php echo ($_SESSION['darkMode'] == 'N' ? 'light' : 'dark'); ?>";
        localStorage.setItem("theme", userTheme);
      </script>
      <?php 
        // Redirect to the secure area
        header("Location: index.php");
        exit();
    } else {
        // Redirect back to login page with an error code for invalid password
        header("Location: login.php?error=invalid_password");
        exit();
    }
} else {
    // Redirect back to login page with an error code for invalid username
    header("Location: login.php?error=invalid_username");
    exit();
}

// Close connections
$stmt->close();
$conn->close();
?>
