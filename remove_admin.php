<?php
session_start();

// Include database configuration file
include 'config.php';

// Check if user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Update user's role to 'user' in the database
    $update_query = "UPDATE users SET role = 'user' WHERE id = $user_id";
    $result = mysqli_query($conn, $update_query);

    if($result) {
        // Redirect back to the admin panel with success message
        $_SESSION['success_message'] = "User's admin status has been successfully removed.";
        header("Location: admin.php");
        exit;
    } else {
        // Redirect back to the admin panel with error message
        $_SESSION['error_message'] = "Failed to remove user's admin status. Please try again.";
        header("Location: admin.php");
        exit;
    }
} else {
    // Redirect back to the admin panel with error message if user ID is not provided
    $_SESSION['error_message'] = "User ID not provided. Please try again.";
    header("Location: admin.php");
    exit;
}
?>
