<?php
session_start();

// Check if the user is logged in as admin


// Include database configuration file
include 'config.php';

// Check if user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Update user's role to admin in the database
    $update_query = "UPDATE users SET role = 'admin' WHERE id = $user_id";
    $result = mysqli_query($conn, $update_query);

    if($result) {
        // Redirect back to the admin panel with success message
        $_SESSION['success_message'] = "User has been successfully promoted to admin.";
        header("Location: admin.php");
        exit;
    } else {
        // Redirect back to the admin panel with error message
        $_SESSION['error_message'] = "Failed to promote user to admin. Please try again.";
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
