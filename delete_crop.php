
<?php
// Include database configuration file
include 'config.php';

// Check if the ID parameter is set
if(isset($_GET['id'])) {
    // Sanitize the input
    $cropId = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete the row from the database
    $sql = "DELETE FROM crop_library WHERE id = '$cropId'";
    if(mysqli_query($conn, $sql)) {
        // Redirect to the admin panel or display a success message
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No ID provided";
}
?>
