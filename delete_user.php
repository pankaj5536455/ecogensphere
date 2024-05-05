<?php
session_start();

// Include database configuration file
include 'config.php';

// Check if user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete user from the database
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $delete_query);

    if($result) {
        // Redirect back to the admin panel with success message
        $_SESSION['success_message'] = "User has been successfully deleted.";
        header("Location: admin.php");
        exit;
    } else {
        // Redirect back to the admin panel with error message
        $_SESSION['error_message'] = "Failed to delete user. Please try again.";
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
